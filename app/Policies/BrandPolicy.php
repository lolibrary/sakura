<?php

namespace App\Policies;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BrandPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->junior();
    }

    public function view(User $user, Brand $brand): bool
    {
        return $user->junior();
    }

    public function create(User $user): bool
    {
        return $user->admin();
    }

    public function update(User $user, Brand $brand): bool
    {
        return $user->admin();
    }

    public function delete(User $user, Brand $brand): bool
    {
        if ($brand->items()->count() > 0) {
            return false;
        }

        return $user->admin();
    }
}
