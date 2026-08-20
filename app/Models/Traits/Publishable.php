<?php

namespace App\Models\Traits;

use App\Enums\Status;
use App\Events\ChangesRequested;
use App\Events\ItemPublished;
use App\Events\ItemRetracted;
use App\Events\MarkedAsActive;
use App\Events\MarkedAsDraft;
use App\Events\MarkedAsDuplicate;
use App\Events\ReadyForReview;
use App\Models\Item;
use App\Models\User;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

trait Publishable
{
    /**
     * Boot this trait, registering model handlers.
     */
    protected static function bootPublishable(): void
    {
        static::creating(function (Item $model) {
            $model->submitter()->associate(auth()->user());
        });
    }

    /**
     * Publish this item.
     */
    public function publish(?User $user = null): bool
    {
        $user = $user ?? auth()->user();

        $this->metadata->put('previous_status', $this->status->value);
        $this->metadata->put('published_by', auth()->id());
        $this->metadata->put('published_at', now()->format(DateTimeInterface::RFC3339));

        $this->status = Status::Published;
        $this->publisher()->associate($user);
        $this->published_at = now();

        $result = $this->save();

        event(new ItemPublished($this));

        return $result;
    }

    /**
     * Make this item a draft.
     */
    public function retract(): bool
    {
        $this->metadata->put('previous_status', $this->status->value);
        $this->metadata->put('previous_publisher_id', $this->publisher_id);
        $this->metadata->put('retracted_at', now()->format(DateTimeInterface::RFC3339));
        $this->metadata->put('retracted_by', auth()->id());

        $this->status = Status::Retracted;
        $this->published_at = null;

        $this->publisher()->dissociate();

        $result = $this->save();

        event(new ItemRetracted($this));

        return $result;
    }

    /**
     * Mark this item pending (ready for review).
     */
    public function markReadyForReview(): bool
    {
        $this->metadata->put('previous_status', $this->status->value);
        $this->metadata->put('ready_for_review_by', auth()->id());
        $this->metadata->put('ready_for_review_at', now()->format(DateTimeInterface::RFC3339));
        $this->status = Status::ReadyForReview;

        $result = $this->save();

        event(new ReadyForReview($this));

        return $result;
    }

    /**
     * Make this item 'changes required'.
     */
    public function requestChanges(): bool
    {
        $this->metadata->put('previous_status', $this->status->value);
        $this->metadata->put('changes_requested_by', auth()->id());
        $this->metadata->put('changes_requested_at', now()->format(DateTimeInterface::RFC3339));
        $this->status = Status::ChangesRequested;

        $result = $this->save();

        event(new ChangesRequested($this));

        return $result;
    }

    public function markAsDraft(): bool
    {
        $this->metadata->put('previous_status', $this->status->value);
        $this->metadata->put('marked_as_draft_by', auth()->id());
        $this->metadata->put('marked_as_draft_at', now()->format(DateTimeInterface::RFC3339));
        $this->status = Status::Draft;

        $result = $this->save();

        event(new MarkedAsDraft($this));

        return $result;
    }

    public function markAsActive(): bool
    {
        $this->metadata->put('previous_status', $this->status->value);
        $this->metadata->put('marked_as_active_by', auth()->id());
        $this->metadata->put('marked_as_active_at', now()->format(DateTimeInterface::RFC3339));
        $this->status = Status::Draft;

        $result = $this->save();

        event(new MarkedAsActive($this));

        return $result;
    }

    public function markAsDuplicate(Item $of): bool
    {
        $this->metadata->put('previous_status', $this->status->value);
        $this->metadata->put('marked_as_duplicate_by', auth()->id());
        $this->metadata->put('marked_as_duplicate_at', now()->format(DateTimeInterface::RFC3339));
        $this->metadata->put('duplicate_item_id', $of->getKey());
        $this->status = Status::Duplicate;

        $result = $this->save();

        event(new MarkedAsDuplicate($this));

        return $result;
    }

    /**
     * Return if this item is pending.
     */
    public function changesRequested(): bool
    {
        return $this->status === Status::ChangesRequested;
    }

    /**
     * Return if this item is pending.
     */
    public function readyForReview(): bool
    {
        return $this->status === Status::ReadyForReview;
    }

    /**
     * Return if an item is published or not.
     */
    public function published(): bool
    {
        return $this->status === Status::Published;
    }

    /**
     * Return if this item is a draft.
     */
    public function draft(): bool
    {
        return $this->status === Status::Draft;
    }

    public function inactive(): bool
    {
        return $this->status === Status::Inactive;
    }

    /**
     * Scope to drafts only.
     *
     * @return Builder|\Illuminate\Database\Query\Builder
     */
    public function scopeDrafts(EloquentBuilder $builder, bool $draft = true)
    {
        return $builder->where('status', $draft ? Status::Draft : Status::Published);
    }

    public function duplicate(): bool
    {
        return $this->status === Status::Duplicate;
    }

    public function retracted(): bool
    {
        return $this->status === Status::Retracted;
    }
}
