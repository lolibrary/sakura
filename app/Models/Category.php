<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\Traits\Cacheable;

/**
 * A type of item, e.g. JSK.
 *
 * @property string $slug The URL slug of this type.
 * @property string $name The friendly name of this type.
 * @property \App\Models\Item[]|\Illuminate\Database\Eloquent\Collection $items
 */
class Category extends Model implements TranslatableContract
{
    use Cacheable;
    use Translatable;

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
        'url',
    ];

    /**
     * Get the items that belong to a category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
