<?php

namespace App\Models\Traits;

use App\Enums\Status;
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

        $this->status = static::PUBLISHED;
        $this->publisher()->associate($user);
        $this->published_at = now();
        return $this->save();
    }

    /**
     * Make this item a draft.
     */
    public function unpublish(): bool
    {
        $this->status = Status::Draft;
        return $this->save();
    }

    /**
     * Mark this item pending (ready for review).
     */
    public function readyForReview(): bool
    {
        $this->status = Status::Pending;
        return $this->save();
    }

    /**
     * Make this item 'changes required'.
     */
    public function requestChanges(): bool
    {
        $this->status = Status::ChangesRequested;
        return $this->save();
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
    public function pending(): bool
    {
        return $this->status === Status::Pending;
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
