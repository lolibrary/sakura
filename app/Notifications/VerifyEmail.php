<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerify;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Force queueing this notifications.
 */
class VerifyEmail extends BaseVerify implements ShouldQueue
{
    //
}
