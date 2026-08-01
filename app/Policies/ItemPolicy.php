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
        if ($user->is($item->submitter) || $item->status === Status::Published) {
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
        // cannot publish twice, or publish if changes requested.
        if (in_array($item->status, [Status::Published])) {
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

    public function markAsDraft(User $user, Item $item): bool
    {
        // this requires the item to be in "ready for review" or "changes requested"
        if (! in_array($item->status, [Status::ReadyForReview, Status::ChangesRequested])) {
            return false;
        }

        if ($item->submitter->is($user)) {
            return $user->junior();
        }

        return $user->senior();
    }

    public function readyForReview(User $user, Item $item): bool
    {
        // this is valid from "changes requested" and "draft" states on your own items.
        if (! in_array($item->status, [Status::Draft, Status::ChangesRequested])) {
            return false;
        }

        if ($item->submitter->is($user)) {
            return $user->junior();
        }

        return $user->senior();
    }

    public function requestChanges(User $user, Item $item): bool
    {
        // you can request changes from "draft" or "ready for review"
        // todo: possibly remove requesting changes on a draft.
        if (! in_array($item->status, [Status::ReadyForReview])) {
            return false;
        }

        // can't request changes on your own submission
        if ($item->submitter->is($user)) {
            return false;
        }

        // senior and up can request changes.
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
