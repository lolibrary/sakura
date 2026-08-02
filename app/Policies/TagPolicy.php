<?php

namespace App\Policies;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy extends Policy
{
    use HandlesAuthorization;

    public function view(User $user, Tag $tag): bool
    {
        return $user->junior();
    }

    public function create(User $user): bool
    {
        return $user->trusted();
    }

    public function update(User $user, Tag $tag): bool
    {
        return $user->trusted();
    }

    public function delete(User $user, Tag $tag): bool
    {
        if ($tag->items()->count() > 0) {
            return false;
        }

        return $user->trusted();
    }
}
