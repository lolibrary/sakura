<?php

namespace App\Policies;

use App\Models\Feature;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeaturePolicy extends Policy
{
    use HandlesAuthorization;

    public function view(User $user, Feature $feature): bool
    {
        return $user->junior();
    }

    public function create(User $user): bool
    {
        return $user->trusted();
    }

    public function update(User $user, Feature $feature): bool
    {
        return $user->trusted();
    }

    public function delete(User $user, Feature $feature): bool
    {
        if ($feature->items()->count() > 0) {
            return false;
        }

        return $user->trusted();
    }
}
