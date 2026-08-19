<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Appends;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Visible;
use Illuminate\Database\Eloquent\Casts\Attribute as AttributeCast;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * An attribute.
 *
 * @property string $slug The URL route slug of this model.
 * @property string $name The name of this model.
 * @property string $value The value of this attribute's pivot.
 * @property Pivot $pivot A pivot object containing the value of this attribute.
 */
#[Fillable('name', 'slug')]
#[Visible('name', 'slug', 'value')]
#[Appends('value')]
class Attribute extends Informational
{
    public function value(): AttributeCast
    {
        return AttributeCast::get(fn () => $this->pivot?->value);
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class);
    }

    public function values(): HasMany
    {
        return $this->hasMany(AttributeItem::class);
    }
}
