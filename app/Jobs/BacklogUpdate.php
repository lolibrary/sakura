<?php

namespace App\Jobs;

use App\Enums\Status;
use App\Enums\SystemUser;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
     */
    public function __invoke(): void
    {
        if (! app()->isProduction()) {
            Log::info('Not running BacklogUpdate: not running in production');

            return;
        }

        $amy = User::system(SystemUser::Amy);

        $webhook = config('services.discord.webhooks.updates');
        $published = DB::table('items')->where('status', '=', Status::Published)->count();
        $pending = DB::table('items')->where('status', '=', Status::ReadyForReview)->count();
        $changes = DB::table('items')->where('status', '=', Status::ChangesRequested)->count();
        $draft = DB::table('items')
            ->whereNot('user_id', $amy->id)
            ->where('status', '=', Status::Draft)
            ->count();

        $msg = <<<EOD
        ## *Current Entries*
        **$draft** drafts
        **$pending** pending review
        **$changes** post-review, changes requested
        **$published** published


        EOD;

        $client = new Client;
        $res = $client->request('POST', $webhook, ['json' => ['content' => $msg]]);

        if ($res->getStatusCode() >= 400) {
            $this->fail(new \RuntimeException('Failed to message discord'));
        }
    }
}
