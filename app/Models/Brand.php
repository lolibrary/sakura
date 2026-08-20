<?php

namespace App\Models;

use App\Contracts\Orderable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Visible;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $order
 * @property string $short_name The short name for this brand.
 * @property string $image
 */
#[Fillable('name', 'short_name', 'slug', 'image', 'order')]
#[Visible('name', 'short_name', 'slug', 'image', 'order', 'url')]
class Brand extends Informational implements Orderable
{
    /**
     * @var array<string, string>
     */
    protected $casts = ['order' => 'integer'];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
