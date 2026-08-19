<?php

namespace App\Models\Traits;

use App\Enums\SystemUser;

trait HasSystemUsers
{
    public static function system(SystemUser $user): static
    {
        return cache()->remember(
            key: 'system.user.'.$user->value,
            ttl: 1440,
            callback: fn () => static::username($user->value)->firstOrFail(),
        );
    }
}
