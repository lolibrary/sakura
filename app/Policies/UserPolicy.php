<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Can a user update an item?
     * 
     * @param \App\Models\User $user
     * @param \App\Models\Item $item
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $user->admin();
    }

    /**
     * Can a user update an item?
     * 
     * @param \App\Models\User $user
     * @param \App\Models\Item $item
     * @return bool
     */
    public function view(User $user)
    {
        return $user->admin();
    }

    /**
     * Can a user update an item?
     * 
     * @param \App\Models\User $user
     * @param \App\Models\Item $item
     * @return bool
     */
    public function update(User $user, User $target)
    {
        if ($user->level < $target->level) {
            return false;
        }

        return $user->admin();
    }

    /**
     * Can a user delete an item?
     * 
     * @param \App\Models\User $user
     * @param \App\Models\Item $item
     * @return bool
     */
    public function delete(User $user, User $target)
    {
        if ($user->level < $target->level) {
            return false;
        }
        
        return $user->admin() && $user->id !== $target->id;
    }
}
