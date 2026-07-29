<?php

namespace App\Models;

use App\Models\Traits\Cacheable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Nova\Actions\Actionable;


/**
 * An attribute.
 *
 * @property string $slug The URL route slug of this model.
 * @property string $name The name of this model.
 * @property string $value The value of this attribute's pivot.
 * @property \App\Models\Pivot $pivot A pivot object containing the value of this attribute.
 * @property \App\Models\Item[]|\Illuminate\Database\Eloquent\Collection $items
 */
class Attribute extends Model implements TranslatableContract
{
    use Cacheable;
    use Translatable;
    use Actionable;

    /**
     * Translatable attributes.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];
    public $useTranslationFallback = true;

    /**
     * Fillable attributes.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug'];

    /**
     * Visible attributes.
     *
     * @var array
     */
    protected $visible = [
        'name',
        'slug',
        'value',
    ];

    /**
     * Attributes to append to the array form.
     *
     * @var array
     */
    protected $appends = ['value'];

    /**
     * A getter for $model->value.
     *
     * @return string|null
     */
    public function getValueAttribute()
    {
        if (! $this->pivot) {
            return;
        }

        return $this->pivot->value;
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
