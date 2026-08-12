<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\error;
use function Laravel\Prompts\progress;

class MergeDuplicateEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:merge-duplicate-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Merges duplicate emails, automatically calling app:merge-email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $emails = DB::table('users')
            ->select([DB::raw('lower(email)')])
            ->groupByRaw('lower(email)')
            ->havingRaw('count(lower(email)) = 2')
            ->get()
            ->pluck('lower')
            ->all();

        if (count($emails) === 0) {
            error('No duplicate emails found.');
            return;
        }

        progress(
            label: 'Merging user accounts...',
            steps: $emails,
            callback: fn(string $email) => $this->call('app:merge-email', [
                'email' => $email,
            ]),
        );
    }
}
