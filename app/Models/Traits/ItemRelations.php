<?php

namespace App\Models\Traits;

use App\Models\Attribute;
use App\Models\AttributeItem;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Feature;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property Brand $brand
 * @property Attribute[]|Collection $attributes
 * @property Category[]|Collection $categories
 * @property Color[]|Collection $colors
 * @property Feature[]|Collection $features
 * @property Tag[]|Collection $tags
 * @property AttributeItem[]|Collection $values
 * @property User[]|Collection $owners
 * @property User[]|Collection $stargazers
 * @property User|null $publisher
 * @property User $submitter
 */
trait ItemRelations
{
    /**
     * Boot this trait and properly clean up afterwards.
     */
    protected static function bootItemRelations(): void
    {
        //
    }

    /**
     * The brand of this item.
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the user who submitted this item.
     */
    public function submitter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The tags for this item.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    /**
     * The features of this Item.
     */
    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class)->withTimestamps();
    }

    /**
     * Get a list of the colors this item has.
     */
    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class)->withTimestamps();
    }

    /**
     * The users who have this item in their closet.
     */
    public function owners(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'closet')->withTimestamps();
    }

    /**
     * The users who have this item on their wish list.
     */
    public function stargazers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlist')->withTimestamps();
    }

    /**
     * Get the publisher of this item.
     */
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'publisher_id');
    }

    /**
     * Categories (e.g. JSK, Blouse) this item belongs to.
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get a list of attributes this item has, with values on pivots.
     */
    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)->withPivot('value')->withTimestamps();
    }

    /**
     * Get a list of attributes this item has, with values on pivots.
     */
    public function values(): HasMany
    {
        return $this->hasMany(AttributeItem::class);
    }
}
