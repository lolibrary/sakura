<?php

namespace App\Nova\Metrics;

use App\Models\Item;
use DateTimeInterface;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Metrics\ValueResult;
use Laravel\Nova\Nova;

class ItemsPublished extends Value
{
    /**
     * Calculate the value of the metric.
     */
    public function calculate(NovaRequest $request): ValueResult
    {
        return $this->count($request, Item::where('status', Item::PUBLISHED));
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array<int, string>
     */
    public function ranges(): array
    {
        return [
            7 => Nova::__('Last Week'),
            30 => Nova::__('Last Month'),
            90 => Nova::__('Last 3 Months'),
            180 => Nova::__('Last 6 Months'),
            365 => Nova::__('Last Year'),
            36500 => Nova::__('All Time'), // 100 years
        ];
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
        return 'pending-item-queue';
    }

    /**
     * Get the displayable name of the metric
     *
     * @return \Stringable|string
     */
    public function name()
    {
        return 'Items Published';
    }
}
