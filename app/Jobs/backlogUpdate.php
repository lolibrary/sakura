<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use GuzzleHttp\Client;

class backlogUpdate implements ShouldQueue
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
        $webhook = env("WEBHOOK");
        $published = DB::table('items')->where('status', '=', Item::PUBLISHED)->count();
        $pending = DB::table('items')->where('status', '=', Item::PENDING)->count();
        $draft = DB::table('items')->where('status', '=', Item::DRAFT)
                    ->orWhere('status', '=', Item::CHANGES_REQUESTED)->count();

        $msg = <<<EOD
        ## *Current Status*
        **$published** items published
        **$pending** items pending
        **$draft** draft items
        EOD;

        $client = new Client();
        $res = $client->request('POST', $webhook, ["json" => ["content" => $msg]]);
    }
}
