<?php

namespace App\Filament\Components;

use Filament\Forms\Components\Select;

class YearSelect
{
    public static function make(string $name = 'year'): Select
    {
        return Select::make('year')
            ->placeholder('Unknown')
            ->options(
                collect(range(1990, (int)date('Y') + 3))
                    ->reverse()
                    ->mapWithKeys(fn (int $value) => [$value => $value])
                    ->all()
            )
            ->rules([
                'nullable',
                'integer',
                'min:1990',
                'max:' . (int)date('Y') + 3,
            ])
            ->helperText('The year of release, if known.');
    }
}
