<?php

namespace App\Log;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Actions\LogActivityAction as LogAction;
use function Illuminate\Events\queueable;

class LogActivityAction extends LogAction
{
    protected function save(Model $activity): void
    {
        // save all logs async
        dispatch(queueable(fn () => $activity->save()));
    }
}
