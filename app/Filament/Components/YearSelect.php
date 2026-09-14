<?php

namespace App\Filament\Components;

use Filament\Forms\Components\Select;

class YearSelect
{
    public static function make(string $name = 'year'): Select
    {
        return Select::make($name)
            ->label('Year released')
            ->placeholder('Unknown')
            ->options(
                collect(range(1970, (int) date('Y') + 3))
                    ->reverse()
                    ->mapWithKeys(fn (int $value) => [$value => $value])
                    ->all()
            )
            ->rules([
                'nullable',
                'integer',
                'min:1970',
                'max:'.(int) date('Y') + 3,
            ])
            ->helperText('"Released" means the year the item is made available for purchase, even if the delivery date is in a different year.');
    }
}
