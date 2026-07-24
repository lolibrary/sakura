<?php

namespace App\Nova\Metrics;

use App\Models\User;
use DateTimeInterface;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Partition;
use Laravel\Nova\Metrics\PartitionResult;

class UsersByRole extends Partition
{
    /**
     * Calculate the value of the metric.
     */
    public function calculate(NovaRequest $request): PartitionResult
    {
        return $this->count(
            $request, User::class, groupBy: 'level',
        )->label(fn (int $value) => match ($value) {
            User::DEVELOPER => 'Developer',
            User::ADMIN => 'Admin',
            User::SENIOR_LOLIBRARIAN => 'Senior Lolibrarian',
            User::LOLIBRARIAN => 'Lolibrarian',
            User::JUNIOR_LOLIBRARIAN => 'Junior Lolibrarian',
            User::REGULAR => 'Regular User',
            User::BANNED => 'Banned',
            default => 'Unknown',
        });
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
        return 'users-by-role';
    }
}
