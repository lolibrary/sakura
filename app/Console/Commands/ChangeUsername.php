<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

use function Laravel\Prompts\info;
use function Laravel\Prompts\error;

class ChangeUsername extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:rename {user} {to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rename a user (username only).';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (is_null($user = User::username($this->argument('user'))->first())) {
            error("User {$this->argument('user')} not found");
            return;
        }

        $username = str($this->argument('to'))->slug();
        $user->username = $username;

        $user->save();
        info("Renamed {$this->argument('user')} to $username");
    }
}
