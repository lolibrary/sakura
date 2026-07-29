<?php

namespace App\Models\Traits;

use App\Enums\Status;
use App\Events\ChangesRequested;
use App\Events\ItemPublished;
use App\Events\ItemUnpublished;
use App\Events\MarkedAsDraft;
use App\Events\ReadyForReview;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

trait Publishable
{
    /**
     * Boot this trait, registering model handlers.
     *
     * @return void
     */
    protected static function bootPublishable()
    {
        static::creating(function (Item $model) {
            $model->submitter()->associate(auth()->user());
        });

        static::saved(function (Item $model) {
            // first up: fully load the item
            $model->load(static::FULLY_LOAD);

            // next: backup cache this on update
            cache()->forever($model->getCacheKey(), $model);
        });
    }

    /**
     * Publish this item.
     */
    public function publish(?User $user = null): bool
    {
        $user = $user ?? auth()->user();

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
    public function unpublish(): bool
    {
        $this->status = Status::Draft;
        $this->publisher()->dissociate();
        $this->published_at = null;

        $result = $this->save();

        event(new ItemUnpublished($this));

        return $result;
    }

    /**
     * Mark this item pending (ready for review).
     */
    public function markReadyForReview(): bool
    {
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
        $this->status = Status::ChangesRequested;

        $result = $this->save();

        event(new ChangesRequested($this));

        return $result;
    }

    public function markAsDraft(): bool
    {
        $this->status = Status::Draft;

        $result = $this->save();

        event(new MarkedAsDraft($this));

        return $result;
    }

    /**
     * Return if this item is pending.
     *
     * @return bool
     */
    public function changesRequested(): bool
    {
        return $this->status === Status::ChangesRequested;
    }

    /**
     * Return if this item is pending.
     *
     * @return bool
     */
    public function readyForReview(): bool
    {
        return $this->status === Status::ReadyForReview;
    }

    /**
     * Return if an item is published or not.
     *
     * @return bool
     */
    public function published(): bool
    {
        return $this->status === Status::Published;
    }

    /**
     * Return if this item is a draft.
     *
     * @return bool
     */
    public function draft(): bool
    {
        return $this->status === Status::Draft;
    }

    /**
     * Scope to drafts only.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param bool $draft
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function scopeDrafts(EloquentBuilder $builder, bool $draft = true)
    {
        return $builder->where('status', $draft ? Status::Draft : Status::Published);
    }
}
