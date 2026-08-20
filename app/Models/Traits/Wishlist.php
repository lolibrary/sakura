<?php

namespace App\Models\Traits;

use App\Models\Item;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Wishlist
{
    /**
     * The items a user has favourited/wishlisted.
     *
     * @return BelongsToMany<Item>
     */
    public function wishlist(?string $order = null)
    {
        return $this->belongsToMany(Item::class, 'wishlist')
            ->withTimestamps()
            ->orderBy(...(sorted($order ?? 'added_new', 'wishlist')));
    }

    /**
     * Update a user's wishlist and return if we added to the wishlist.
     */
    public function updateWishlist(Item $item): bool
    {
        $result = $this->wishlist()->toggle($item);

        return count($result['attached']) > 0;
    }

    /**
     * Check if a user has wishlisted a specific item.
     */
    public function wants(Item $item): bool
    {
        return ! $this->wishlist()->where('item_id', $item->id)->exists();
    }
}
