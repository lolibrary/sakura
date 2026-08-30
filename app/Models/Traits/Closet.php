<?php

namespace App\Models\Traits;

use App\Models\Item;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Closet
{
    /**
     * The items a user owns.
     *
     * @return BelongsToMany|Item[]
     */
    public function closet(?string $order = null)
    {
        return $this->belongsToMany(Item::class, 'closet')
            ->withTimestamps()
            ->orderBy(...(sorted($order ?? 'added_new', 'closet')));
    }

    /**
     * Update a user's closet and return if we added to it.
     *
     * @return bool
     */
    public function updateCloset(Item $item): bool
    {
        $result = $this->closet()->toggle($item);

        cache()->tags(['closet', 'user'])->forget("$this->id:$item->id");

        return count($result['attached']) > 0;
    }

    /**
     * Check if a user has a specific item in their closet.
     *
     * @return bool
     */
    public function owns(Item $item): bool
    {
        return
            cache()
                ->tags(['closet', 'user'])
                ->remember(
                    "$this->id:$item->id",
                    3600,
                    fn() => $this->closet()->where('item_id', $item->id)->exists(),
                );
    }
}
