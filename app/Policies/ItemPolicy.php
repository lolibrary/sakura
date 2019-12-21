<?php

namespace App\Policies;

use App\Models\Item;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    /**
     * Can a user view available items?
     * 
     * @param \App\Models\User $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $user->junior();
    }

    /**
     * Can a user view a item?
     * 
     * @param \App\Models\User $user
     * @param \App\Models\Item $item
     * @return bool
     */
    public function view(User $user, Item $item)
    {
        return $user->junior();
    }

    /**
     * Can a user create an item draft?
     * 
     * @param \App\Models\User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->junior();
    }

    /**
     * Can a user update an item?
     * 
     * @param \App\Models\User $user
     * @param \App\Models\Item $item
     * @return bool
     */
    public function update(User $user, Item $item)
    {
        if ($item->status === Item::PUBLISHED) {
            return $user->senior();
        }

        // otherwise, this is a draft:
        // users can update their own drafts if junior.
        // users can update other people's drafts if lolibrarian.

        if ($item->user_id === $user->id) {
            return $user->junior();
        }

        return $user->lolibrarian();
    }

    /**
     * Can a user delete an item?
     * 
     * @param \App\Models\User $user
     * @param \App\Models\Item $item
     * @return bool
     */
    public function delete(User $user, Item $item)
    {
        // senior lolibrarians can delete published items.
        if ($item->status === Item::PUBLISHED) {
            return $user->senior();
        }

        // junior can delete their own drafts.
        if ($item->user_id === $user->id) {
            return $user->junior();
        }

        // only senior can delete drafts from other people.
        // This is just a separate check so it can be changed easily.
        return $user->senior();
    }

    /**
     * Can a user update an item?
     * 
     * @param \App\Models\User $user
     * @param \App\Models\Item $item
     * @return bool
     */
    public function publish(User $user, Item $item)
    {
        // must be senior to unpublish.
        if ($item->status === Item::PUBLISHED) {
            return $user->senior();
        }

        // otherwise, this is a draft:
        // users can publish their own drafts if lolibrarian.
        if ($item->user_id === $user->id) {
            return $user->lolibrarian();
        }

        // otherwise senior can publish any draft.
        return $user->senior();
    }
}
