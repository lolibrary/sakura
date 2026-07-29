<?php

namespace App\Policies;

use App\Models\Attribute;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttributePolicy extends Policy
{
    use HandlesAuthorization;

    public function view(User $user, Attribute $attribute): bool
    {
        return $user->junior();
    }

    public function create(User $user): bool
    {
        return $user->trusted();
    }

    public function update(User $user, Attribute $attribute): bool
    {
        return $user->trusted();
    }

    public function delete(User $user, Attribute $attribute): bool
    {
        if ($attribute->items()->count() > 0) {
            return false;
        }

        return $user->trusted();
    }
}
