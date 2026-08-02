<?php

namespace App\Policies;

use App\Models\Color;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ColorPolicy extends Policy
{
    use HandlesAuthorization;

    public function view(User $user, Color $color): bool
    {
        return $user->junior();
    }

    public function create(User $user): bool
    {
        return $user->trusted();
    }

    public function update(User $user, Color $color): bool
    {
        return $user->trusted();
    }

    public function delete(User $user, Color $color): bool
    {
        if ($color->items()->count() > 0) {
            return false;
        }

        return $user->trusted();
    }
}
