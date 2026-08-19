<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Instruction extends Model
{
    /**
     * The values we're allowed to fill here.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'description',
    ];

    /**
     * Get the items that have this care instruction.
     *
     * @return BelongsToMany
     */
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
