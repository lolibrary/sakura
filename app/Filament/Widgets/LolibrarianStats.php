<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LolibrarianStats extends StatsOverviewWidget
{
    protected static ?int $sort = 3;

    protected function getStats(): array
    {
        return [
            Stat::make('Published entries', auth()->user()->publishedItems()),
            Stat::make('Drafts', auth()->user()->draftsWaiting()),
            Stat::make('Pending items', auth()->user()->pendingItems()),
            Stat::make('Changes Requested', auth()->user()->changesRequested()),
        ];
    }
}
