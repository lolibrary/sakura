<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\Traits\Cacheable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Visible;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $short_name The short name for this brand.
 * @property string $image
 */
#[Fillable('name', 'short_name', 'slug', 'image')]
#[Visible('name', 'short_name', 'slug', 'image', 'url')]
class Brand extends Informational
{
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
