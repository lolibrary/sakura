<?php

namespace App\Jobs;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use GuzzleHttp\Client;
use Sentry\Severity;
use Sentry\State\Scope;

class BacklogUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $webhook = config('services.discord.webhooks.updates');
        $published = DB::table('items')->where('status', '=', Item::PUBLISHED)->count();
        $pending = DB::table('items')->where('status', '=', Item::PENDING)->count();
        $changes = DB::table('items')->where('status', '=', Item::CHANGES_REQUESTED)->count();
        $draft = DB::table('items')->where('status', '=', Item::DRAFT)->count();

        $msg = <<<EOD
        ## *Current Entries*
        **$draft** drafts
        **$pending** pending review
        **$changes** post-review, changes requested
        **$published** published


        EOD;

        $client = new Client();
        $res = $client->request('POST', $webhook, ["json" => ["content" => $msg]]);

        if ($res->getStatusCode() !== 200) {
            $scope = new Scope();
            $scope->setContext('response', [
                'body' => $res->getBody()->getContents(),
                'status_code' => $res->getStatusCode(),
                'headers' => $res->getHeaders(),
            ]);

            app('sentry')->reportMessage('Failed to send discord webhook', Severity::error(), $scope);
        }
    }
}
