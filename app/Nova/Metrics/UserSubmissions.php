<?php

namespace App\Nova\Metrics;

use App\Models\Item;
use DateTimeInterface;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Partition;
use Laravel\Nova\Metrics\PartitionResult;

class UserSubmissions extends Partition
{
    /**
     * Calculate the value of the metric.
     */
    public function calculate(NovaRequest $request): PartitionResult
    {
        return $this->count(
            $request,
            Item::where('user_id', $request->resourceId)
                ->whereIn('status', [Item::DRAFT, Item::PENDING, Item::CHANGES_REQUESTED]),
            groupBy: 'status',
        )->label(fn(int $value) => match ($value) {
            Item::DRAFT => 'Drafts',
            Item::PENDING => 'Pending Review',
            Item::CHANGES_REQUESTED => 'Changes Requested',
        })->colors([
            Item::DRAFT => '#FF746C',
            Item::PENDING => '#B19CD9',
            Item::CHANGES_REQUESTED => '#B3EBF2',
        ]);
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     */
    public function cacheFor(): DateTimeInterface|null
    {
        // return now()->addMinutes(5);

        return null;
    }

    /**
     * Get the URI key for the metric.
     */
    public function uriKey(): string
    {
        return 'user-submissions';
    }
}
