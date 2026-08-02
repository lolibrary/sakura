<?php

namespace App\Filament\Resources\Items\Widgets;

use Filament\Widgets\ChartWidget;

class ItemStatsOverview extends ChartWidget
{
    protected ?string $heading = 'Item Stats Overview';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
