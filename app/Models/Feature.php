<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * A feature of an Item (e.g. Back Shirring).
 *
 * @property string $name The name of this Feature.
 * @property string $slug The URL slug of this Feature.
 * @property Item[]|Collection $items
 */
class Feature extends Informational
{
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class);
    }
}
