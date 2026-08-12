<?php

namespace App\Console\Commands;

use App\Jobs\Auth\MergeAccounts;
use App\Mail\AccountMerged;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\error;

class MergeAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:merge-email
        {email : the email of the account}
        {--delete : Delete the old account instead of deactivating it}
        {--dont-email : Do not send an email to the user about the account merge}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Merge two accounts into one, deactivating/deleting the old one';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::where(DB::raw('lower(email)'), $this->argument('email'))
            ->orderByDesc('updated_at')->get();

        if ($users->count() !== 2) {
            error("Can only merge a duplicate account via this command, {$users->count()} users found");
        }

        $new = $users->first();
        $old = $users->last();

        // dispatch the job first before we email; this should be sync at this point.
        // we'll call it async when doing a batch.
        dispatch_sync(new MergeAccounts($old, $new));

        if ($this->option('delete')) {
            $old->delete();
        }

        $new = $new->fresh();

        if (! $this->option('dont-email')) {
            Mail::to($new)->queue(new AccountMerged($new->metadata->get('merged_username'), $new));
        }
    }
}
