<?php

namespace App\Models;

use App\Contracts\VisibleTo;
use App\Enums\Visibility;
use App\Models\Scopes\VisibilityScope;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Attributes\Visible;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable('name', 'slug', 'visibility')]
#[Visible('name', 'slug', 'visibility', 'url')]
#[ScopedBy(VisibilityScope::class)]
class Tag extends Informational implements VisibleTo
{
    protected $casts = ['visibility' => Visibility::class];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class);
    }

    public function isVisibleTo(?Authenticatable $user): bool
    {
        // bail out and make it global-only if not logged in
        if ($user !== null) {
            // do not apply a visibility scope to senior and up
            if ($user->senior()) {
                return true;
            }

            // apply public / authenticated for lolibrarian+
            if ($user->lolibrarian()) {
                return in_array($this->visibility, [Visibility::Public, Visibility::Authenticated], strict: true);
            }
        }

        return $this->visibility === Visibility::Public;
    }
}
