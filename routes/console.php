<?php

use App\Jobs\BacklogUpdate;
use Illuminate\Support\Facades\Schedule;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/


Schedule::call(new BacklogUpdate)
    ->dailyAt('13:00')
    ->name(BacklogUpdate::class)
    ->description('Daily update to #queue-updates in Discord')
    ->onOneServer();

Schedule::call('item:cache')
    ->name(BacklogUpdate::class)
    ->description('Cache pending + changes requested items')
    ->everyFiveMinutes();

