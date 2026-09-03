<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

use function Laravel\Prompts\info;

#[Signature('settings:flush')]
#[Description('Flush the site settings cache.')]
class FlushSettings extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        app('settings')->forget();

        info('Settings cache flushed');
    }
}
