<?php

namespace App\Policies;

use App\Models\User;

class Policy
{
    public function viewAny(User $user): bool
    {
        return $user->junior();
    }

    public function deleteAny(User $user): bool
    {
        return $user->developer();
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->developer();
    }
}
