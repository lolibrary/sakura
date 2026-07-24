<?php

namespace App\Nova\Metrics;

use App\Models\Item;
use DateTimeInterface;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Partition;
use Laravel\Nova\Metrics\PartitionResult;

class UserItemsPublished extends Partition
{
    /**
     * Calculate the value of the metric.
     */
    public function calculate(NovaRequest $request): PartitionResult
    {
        $selfPublished = Item::where('user_id', $request->resourceId)
            ->where('publisher_id', $request->resourceId)
            ->where('status', Item::PUBLISHED)
            ->count();

        $published = Item::where('user_id', $request->resourceId)
            ->whereNot('publisher_id', $request->resourceId)
            ->where('status', Item::PUBLISHED)
            ->count();

        return $this->result([
            'Published' => $published,
            'Self-Published' => $selfPublished,
        ])->colors([
            'Published' => '#ADEBB3',
            'Self-Published' => '#B19CD9',
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
        return 'user-items-published';
    }
}
