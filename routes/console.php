<?php

use App\Jobs\BacklogUpdate;
use App\Jobs\DeleteAbandonedDrafts;
use App\Jobs\MarkInactiveEntries;
use App\Jobs\PreserveAbandonedItems;
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

Schedule::call(new MarkInactiveEntries)
    ->dailyAt('00:00')
    ->name(MarkInactiveEntries::class)
    ->description('Mark drafts updated over a year ago as inactive')
    ->onOneServer();

Schedule::call(new PreserveAbandonedItems)
    ->name(PreserveAbandonedItems::class)
    ->description('Anonymise any published entries where a user has deleted their account')
    ->daily()
    ->onOneServer();

Schedule::call(new DeleteAbandonedDrafts)
    ->name(DeleteAbandonedDrafts::class)
    ->description('Delete any draft entries where a user has deleted their account')
    ->daily()
    ->onOneServer();
