<?php

namespace App\Models\Traits;

use App\Models\User;
use App\Notifications\VerifyEmail;
use Illuminate\Support\Str;

trait VerifiesEmails
{
    public static function bootVerifiesEmails()
    {
        static::created(function (User $user) {
            $user->email_token = Str::random(128);
            $user->save();

            $user->notify(new VerifyEmail($user));
        });
    }

    /**
     * Get a magic "verified" attribute.
     *
     * @return bool
     */
    public function getVerifiedAttribute()
    {
        return $this->email_token === null;
    }
}
