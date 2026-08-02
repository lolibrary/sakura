<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy extends Policy
{
    use HandlesAuthorization;

    public function view(User $user, Category $category): bool
    {
        return $user->junior();
    }

    public function create(User $user): bool
    {
        return $user->trusted();
    }

    public function update(User $user, Category $category): bool
    {
        return $user->trusted();
    }

    public function delete(User $user, Category $category): bool
    {
        if ($category->items()->count() > 0) {
            return false;
        }

        return $user->trusted();
    }
}
