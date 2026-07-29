<?php

namespace App\Policies;

use App\Models\Color;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ColorPolicy
{
    use HandlesAuthorization;

    /**
     * Can a user view available colors?
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->junior();
    }

    /**
     * Can a user view a color?
     *
     * @param \App\Models\User $user
     * @param \App\Models\Color $color
     * @return bool
     */
    public function view(User $user, Color $color): bool
    {
        return $user->junior();
    }

    /**
     * Can a user create a color?
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->trusted();
    }

    /**
     * Can a user update a color?
     *
     * @param \App\Models\User $user
     * @param \App\Models\Color $color
     * @return bool
     */
    public function update(User $user, Color $color): bool
    {
        return $user->trusted();
    }

    /**
     * Can a user delete a color?
     *
     * @param \App\Models\User $user
     * @param \App\Models\Color $color
     * @return bool
     */
    public function delete(User $user, Color $color): bool
    {
        if ($color->items()->count() > 0) {
            return false;
        }

        return $user->trusted();
    }
}
