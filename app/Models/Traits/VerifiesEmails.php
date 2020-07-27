<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;
use App\Models\User;
use App\Notifications\VerifyEmail;

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
