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
        if ($user->is($item->submitter) || in_array($item->status, [Status::Published, Status::Duplicate])) {
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
        // nobody can edit inactive - reactivate it first
        if ($item->status === Status::Inactive) {
            return false;
        }

        // duplicate is a final state, but you can still edit.
        // it will do precisely nothing, though.
        if ($item->status === Status::Duplicate) {
            return $user->senior();
        }

        // lolibrarians can update their own published items
        // otherwise, only seniors can.
        if ($item->status === Status::Published) {
            if ($user->is($item->submitter) && $user->is($item->publisher)) {
                return $user->lolibrarian();
            }

            return $user->senior();
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
        // you cannot delete a published item. it MUST be retracted first.
        if ($item->status === Status::Published) {
            return false;
        }

        // only trusted seniors can hard delete from redacted.
        // this is to avoid data loss, if a dupe/mistake.
        if ($item->status === Status::Retracted) {
            return $user->trusted();
        }

        // duplicate is a final state - these should not be deleted for "cleanup"
        // duplicated have redirects in place for search engines and user links.
        if ($item->status === Status::Duplicate) {
            return $user->trusted();
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
        // cannot publish twice
        // also cannot publish a duplicate - it is a final state.
        if (in_array($item->status, [Status::Published, Status::Duplicate, Status::Inactive])) {
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
     * Can a user "retract" an item, aka "unpublish".
     *
     * Locks the item into the Retracted state, limiting deletion.
     */
    public function retract(User $user, Item $item): bool
    {
        if ($item->status !== Status::Published) {
            return false; // must be published to retract
        }

        // safety check: must be the publisher *and* the submitter
        // this covers cases where people have been promoted.
        if ($user->is($item->publisher) && $user->is($item->submitter)) {
            return $user->lolibrarian();
        }

        return $user->senior();
    }

    public function markAsDraft(User $user, Item $item): bool
    {
        // this requires the item to be in "ready for review" or "changes requested"
        if (! in_array($item->status, [Status::ReadyForReview, Status::ChangesRequested], strict: true)) {
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
        if (! in_array($item->status, [Status::Draft, Status::ChangesRequested], strict: true)) {
            return false;
        }

        if ($item->submitter->is($user)) {
            return $user->junior();
        }

        return $user->senior();
    }

    public function requestChanges(User $user, Item $item): bool
    {
        // edge case: allow this as a way out of the "duplicate" status.
        // note that we may have the permanent redirect to worry about.
        if ($item->status === Status::Duplicate && $user->trusted()) {
            return true;
        }

        // you can request changes from "ready for review" or "retracted"
        if (! in_array($item->status, [Status::ReadyForReview, Status::Retracted], strict: true)) {
            return false;
        }

        // senior and up can request changes.
        return $user->senior();
    }

    public function markAsDuplicate(User $user, Item $item): bool
    {
        // if already a duplicate, can't do it again
        if ($item->status === Status::Duplicate) {
            return false;
        }

        // if not the submitter: always check senior
        // this means senior can always mark as duplicate from any state.
        if (! $user->is($item->submitter)) {
            return $user->senior();
        }

        // lolibrarians can mark something as a duplicate if it has had changes requested
        if ($item->status === Status::ChangesRequested) {
            return $user->lolibrarian();
        }

        // juniors can mark their own drafts as duplicates (this does nothing but change the status/visibility)
        if (in_array($item->status, [Status::Draft, Status::ReadyForReview], strict: true)) {
            return $user->junior();
        }

        // any other status: senior+
        return $user->senior();
    }

    public function markAsActive(User $user, Item $item): bool
    {
        if ($item->status !== Status::Inactive) {
            return false;
        }

        if ($user->is($item->submitter)) {
            return $user->junior();
        }

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

    public function changeSlug(User $user, Item $item): bool
    {
        return $user->trusted();
    }
}
