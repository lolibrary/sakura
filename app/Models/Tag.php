<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Informational
{
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class);
    }
}
