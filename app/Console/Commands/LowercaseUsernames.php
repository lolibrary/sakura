<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\info;

class LowercaseUsernames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:lowercase-usernames';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lowercase all usernames in the backend where we can';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $exclude = DB::table('usernames')
            ->select(DB::raw('jsonb_agg(username) as "usernames"'))
            ->groupByRaw('lower(username)')
            ->havingRaw('count(lower(username)) > 1')
            ->get()
            ->map(fn ($value) => json_decode($value->usernames, true))
            ->collapse();

        info("Excluding {$exclude->count()} usernames (duplicates)");

        DB::table('usernames')
            ->whereNotIn('username', $exclude->all())
            ->update([
                'username' => DB::raw('lower(username)'),
            ]);

        DB::table('users')
            ->whereNotIn('username', $exclude->all())
            ->update([
                'username' => DB::raw('lower(username)'),
            ]);

        info('Done');
    }
}
