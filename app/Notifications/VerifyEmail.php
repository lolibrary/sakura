<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerify;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

/**
 * Force queueing this notification.
 */
class VerifyEmail extends BaseVerify implements ShouldQueue
{
    use Queueable;
}
