<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Visible;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $image
 */
#[Visible('name', 'slug', 'url', 'image')]
class Category extends Informational
{
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class);
    }
}
