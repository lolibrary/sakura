<?php

namespace App\Models\Traits;

use App\Models\Item;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Wishlist
{
    /**
     * The items a user has favourited/wishlisted.
     *
     * @return BelongsToMany|\App\Item[]
     */
    public function wishlist()
    {
        return $this->belongsToMany(Item::class, 'wishlist')->withTimestamps()->orderBy('wishlist.created_at', 'desc');
    }

    /**
     * Update a user's wishlist and return if we added to the wishlist.
     *
     * @return bool
     */
    public function updateWishlist(Item $item)
    {
        $result = $this->wishlist()->toggle($item);

        return count($result['attached']) > 0;
    }

    /**
     * Check if a user has wishlisted a specific item.
     *
     * @return bool
     */
    public function wants(Item $item)
    {
        return ! $this->wishlist()->where('item_id', $item->id)->exists();
    }
}
