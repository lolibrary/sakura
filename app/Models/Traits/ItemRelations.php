<?php

namespace App\Models\Traits;

use App\Models\Tag;
use App\Models\User;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Feature;
use App\Models\Category;
use App\Models\Attribute;

trait ItemRelations
{
    /**
     * The brand of this item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * The category of this item (shoes, etc).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the user who submitted this item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function submitter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The tags for this item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    /**
     * The features of this Item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function features()
    {
        return $this->belongsToMany(Feature::class)->withTimestamps();
    }

    /**
     * Get a list of attributes this item has, with values on pivots.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->withPivot('value')->withTimestamps();
    }

    /**
     * Get a list of the colors this item has.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withTimestamps();
    }

    /**
     * The users who have this item in their closet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function owners()
    {
        return $this->belongsToMany(User::class, 'closet')->withTimestamps();
    }

    /**
     * The users who have this item on their wish list.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function stargazers()
    {
        return $this->belongsToMany(User::class, 'wishlist')->withTimestamps();
    }

    /**
     * The comments that have been left on this.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the publisher of this item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publisher()
    {
        return $this->belongsTo(User::class, 'publisher_id');
    }
}
