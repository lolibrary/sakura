<?php

namespace App\Nova\Metrics;

use App\Models\Item;
use DateTimeInterface;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Partition;
use Laravel\Nova\Metrics\PartitionResult;

class EntriesWaiting extends Partition
{
    /**
     * Calculate the value of the metric.
     */
    public function calculate(NovaRequest $request): PartitionResult
    {
        return $this->count(
            $request,
            Item::whereIn('status', [Item::DRAFT, Item::PENDING, Item::CHANGES_REQUESTED]),
            groupBy: 'status',
        )->label(fn (int $value) => match ($value) {
            Item::DRAFT => 'Drafts',
            Item::PUBLISHED => 'Published',
            Item::PENDING => 'Pending Review',
            Item::CHANGES_REQUESTED => 'Changes Requested',
            default => 'Unknown',
        })->colors([
            Item::DRAFT => '#FF746C',
            Item::PUBLISHED => '#ADEBB3',
            Item::PENDING => '#B19CD9',
            Item::CHANGES_REQUESTED => '#B3EBF2',
        ]);
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     */
    public function cacheFor(): DateTimeInterface|null
    {
        //return now()->addMinutes(5);
        return null;
    }

    /**
     * Get the URI key for the metric.
     */
    public function uriKey(): string
    {
        return 'items-per-status';
    }

    /**
     * Get the displayable name of the metric
     *
     * @return \Stringable|string
     */
    public function name()
    {
        return 'Entries Waiting';
    }
}
