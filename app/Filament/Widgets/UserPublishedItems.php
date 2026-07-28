<?php

namespace App\Filament\Widgets;

use App\Models\Item;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Str;

class UserPublishedItems extends ChartWidget
{
    protected ?string $heading = 'Item Queue';

    protected static ?int $sort = 4;

    protected static ?int $columns = 4;

    protected function getData(): array
    {
        $items = auth()->user()
            ->items()
            ->withoutEagerLoads()
            ->where('status', '!=', Item::PUBLISHED)
            ->select('status')
            ->get()
            ->groupBy('status')
            ->map
            ->count()
            ->mapWithKeys(function (int $value, int $key) {
                return [Item::STATES[$key] ?? 'unknown' => $value];
            });

        $colors = $items->keys()->map(fn (string $key) => Item::RGB_COLORS[$key] ?? 'danger');

        return [
            'labels' => $items->keys()->map(fn (string $label) => Str::title($label))->all(),
            'datasets' => [
                [
                    'label' => 'Your Items',
                    'data' => $items->values()->map(fn (int $count) => $count)->all(),
                    'backgroundColor' => $colors->all(),
                ],
            ]
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    public static function canView(): bool
    {
        return false;
    }
}
