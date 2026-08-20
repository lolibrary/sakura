<?php

namespace App\Models;

use App\Enums\Visibility;
use App\Models\Scopes\VisibilityScope;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Attributes\Visible;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable('name', 'slug', 'visibility')]
#[Visible('name', 'slug', 'visibility', 'url')]
#[ScopedBy(VisibilityScope::class)]
class Tag extends Informational
{
    protected $casts = ['visibility' => Visibility::class];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class);
    }
}
