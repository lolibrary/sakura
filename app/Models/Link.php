<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property string $linkable_type
 * @property string $linkable_id
 * @property string $slug
 * @property Model $linkable
 */
class Link extends Model
{
    /**
     * Fillable items.
     *
     * @var array
     */
    protected $fillable = ['linkable_type', 'linkable_id', 'slug'];

    /**
     * @var bool
     */
    public $timestamps = false;

    // link types (can be added to in future)
    const ITEM = Item::class;

    const USER = User::class;

    /**
     * Get a link by slug.
     *
     *
     * @return Link
     */
    public static function get(string $slug, string $type = self::ITEM)
    {
        return static::where('linkable_type', '=', $type)->where('slug', '=', $slug)->firstOrFail();
    }

    /**
     * Get the resource we're linking to.
     *
     * @return MorphTo
     */
    public function linkable()
    {
        return $this->morphTo();
    }
}
