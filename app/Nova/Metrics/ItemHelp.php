<?php

namespace App\Nova\Metrics;

use DateTimeInterface;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Metrics\MetricTableRow;
use Laravel\Nova\Metrics\Table;

class ItemHelp extends Table
{
    /**
     * Calculate the value of the metric.
     *
     * @return array<int, \Laravel\Nova\Metrics\MetricTableRow>
     */
    public function calculate(NovaRequest $request): array
    {
        return [
            MetricTableRow::make()
                ->icon('book-open')
                ->iconClass('text-gray-500')
                ->title('Contributing Guidelines')
                ->actions(fn() => [
                    MenuItem::externalLink(
                        'Wiki - Creating an Item',
                        'https://wiki.lolibrary.org/index.php?title=Lolibrary_Entries:_Creating_an_Item'
                    )->openInNewTab(),
                    MenuItem::externalLink(
                        'Wiki - Submitting for Review',
                        'https://wiki.lolibrary.org/index.php?title=Lolibrary_Entries:_Submitting_for_Review'
                    )->openInNewTab(),
                    MenuItem::externalLink(
                        'Wiki - Submitting Corrections',
                        'https://wiki.lolibrary.org/index.php?title=Lolibrary_Entries:_Submitting_Corrections'
                    )->openInNewTab(),
                ]),
            MetricTableRow::make()
                ->icon('question-mark-circle')
                ->iconClass('text-gray-500')
                ->title('Check the discord for help')
                ->subtitle('#junior-help and #lolibrarians')
                ->actions(fn() => [
                    MenuItem::externalLink(
                        'Lolibrary Discord',
                        config('app.discord.invite-link')
                    )->openInNewTab(),
                ]),
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
}
