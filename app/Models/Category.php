<?php

namespace App\Models;

use App\Contracts\Orderable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Visible;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $image
 * @property int $order
 */
#[Fillable('name', 'slug', 'image', 'order')]
#[Visible('name', 'slug', 'url', 'image', 'order')]
class Category extends Informational implements Orderable
{
    /**
     * @var array<string, string>
     */
    protected $casts = ['order' => 'integer'];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class);
    }
}
