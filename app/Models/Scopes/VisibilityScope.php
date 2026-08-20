<?php

namespace App\Models\Scopes;

use App\Enums\Visibility;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class VisibilityScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        // check authenticated user
        $user = auth()->user();

        // bail out and make it global-only if not logged in
        if ($user !== null) {
            // do not apply a visibility scope to senior and up
            if ($user->senior()) {
                return;
            }

            // apply public / authenticated for lolibrarian+
            if ($user->lolibrarian()) {
                $builder->whereIn('visibility', [Visibility::Public, Visibility::Authenticated]);
            }
        }

        $builder->where('visibility', Visibility::Public);
    }
}
