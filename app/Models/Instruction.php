<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Instruction extends Model
{
    /**
     * The values we're allowed to fill here.
     *
     * @var list<string>
     */
    protected $fillable = [
        'slug',
        'description',
    ];

    /**
     * Get the items that have this care instruction.
     *
     * @return BelongsToMany<Item>
     */
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class);
    }
}
