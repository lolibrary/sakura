<?php

namespace App\Console\Commands;

use App\Enums\Level;
use App\Enums\SystemUser;
use Illuminate\Console\Command;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\warning;

class SetupSystemUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup-system-users {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set up all system users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (app()->isProduction() && ! $this->option('force')) {
            warning('Application in production');

            confirm('Are you sure you want to do this? (use --force in prod)', required: true);
        }

        // anonymous is a developer, so that people can update posts.
        $this->call('app:system-user', [
            'username' => SystemUser::Anonymous->value,
            '--edit' => true,
            '--no-info' => true,
            '--level' => Level::Developer->value,
        ]);

        $this->call('app:system-user', [
            'username' => SystemUser::Admin->value,
            '--edit' => true,
            '--no-info' => true,
        ]);

        $this->call('app:system-user', [
            'username' => SystemUser::Lolibrary->value,
            '--edit' => true,
            '--no-info' => true,
        ]);

        $this->call('app:system-user', [
            'username' => SystemUser::System->value,
            '--edit' => true,
            '--no-info' => true,
        ]);

        $this->call('app:system-user', [
            'username' => SystemUser::Amy->value,
            '--edit' => true,
            '--level' => Level::Amy->value,
            '--no-info' => true,
        ]);
    }
}
