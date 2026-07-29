<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->senior();
    }

    public function view(User $user, User $target): bool
    {
        return $user->senior() || $user->is($target);
    }

    public function viewEmail(User $user, User $target): bool
    {
        return $user->admin() || $user->is($target);
    }

    public function update(User $user, User $target): bool
    {
        // cannot update someone of a higher or equal level than them
        // This also means only developers can edit admins.
        if ($user->developer()) {
            return true;
        }

        if ($user->level->value <= $target->level->value) {
            return false;
        }

        return $user->admin();
    }

    public function delete(User $user, User $target): bool
    {
        return $this->update($user, $target) && $user->isNot($target);
    }

    public function comment(User $user, User $target): bool
    {
        return $user->senior();
    }
}
