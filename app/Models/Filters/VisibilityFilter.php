<?php

namespace App\Models\Filters;

use App\Contracts\VisibleTo;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class VisibilityFilter
{
    public function __invoke(Model $model): bool
    {
        if (! $model instanceof VisibleTo) {
            return true;
        }

        return $model->isVisibleTo(auth()->user());
    }

    public static function user(?Authenticatable $user): \Closure
    {
        return function (Model $model) use ($user) {
            if (! $model instanceof VisibleTo) {
                return true;
            }

            return $model->isVisibleTo($user);
        };
    }
}
