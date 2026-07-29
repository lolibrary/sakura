<?php

namespace App\Policies;

use App\Enums\Status;
use App\Models\Item;
use App\Models\User;
use App\Traits\HasAttachPolicies;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy extends Policy
{
    use HandlesAuthorization, HasAttachPolicies;

    public function view(User $user, Item $item): bool
    {
        if ($user->is($item->submitter)) {
            return $user->junior();
        }

        return $user->lolibrarian();
    }

    public function create(User $user): bool
    {
        return $user->junior();
    }

    public function update(User $user, Item $item): bool
    {
        // lolibrarians can update their own published items
        // otherwise, only seniors can.
        if ($item->status === Status::Published) {
            return $user->is($item->publisher) ? $user->lolibrarian() : $user->senior();
        }

        // draft: if the submitter, allow edits
        if ($user->is($item->submitter)) {
            return $user->junior();
        }

        // if senior, allow edits anyway.
        return $user->senior();
    }


    public function delete(User $user, Item $item): bool
    {
        if ($item->published()) {
            // lolibrarian can delete items they themselves published
            if ($user->is($item->publisher)) {
                return $user->lolibrarian();
            }

            // senior lolibrarians can delete published items.
            return $user->senior();
        }

        // junior can delete their own drafts.
        if ($user->is($item->submitter)) {
            return $user->junior();
        }

        // only senior can delete drafts from other people.
        // This is just a separate check so it can be changed easily.
        return $user->senior();
    }

    public function publish(User $user, Item $item): bool
    {
        // cannot publish twice.
        if ($item->published()) {
            return false;
        }

        // users can publish their own drafts if lolibrarian.
        if ($user->is($item->submitter)) {
            return $user->lolibrarian();
        }

        // otherwise senior can publish any draft.
        return $user->senior();
    }

    public function unpublish(User $user, Item $item): bool
    {
        // cannot unpublish if it's not already published.
        if (! $item->published()) {
            return false;
        }

        // users can publish their own drafts if lolibrarian.
        if ($user->is($item->submitter)) {
            return $user->lolibrarian();
        }

        // otherwise senior can publish any draft.
        return $user->senior();
    }

    /**
     * Check if a user is allowed to view and write comments on an item.
     *
     * Both are tied to the same permission.
     * These comments are not public.
     */
    public function comment(User $user, Item $item): bool
    {
        if (! $this->view($user, $item)) {
            return false;
        }

        return $user->is($item->submitter) ? $user->junior() : $user->senior();
    }
}
