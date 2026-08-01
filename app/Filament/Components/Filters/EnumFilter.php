<?php

namespace App\Filament\Components\Filters;

use BackedEnum;
use Filament\Support\Contracts\HasLabel;
use Filament\Tables\Filters\SelectFilter;

class EnumFilter
{
    /**
     * Pass a list of backed enums to this for a proper select.
     *
     * @param string $name
     * @param array|BackedEnum[]|HasLabel[] $filters
     * @return SelectFilter
     */
    public static function make(string $name, array $filters): SelectFilter
    {
        $enums = collect($filters)->mapWithKeys(fn (BackedEnum | HasLabel $e) => [
            $e->value => $e->getLabel(),
        ]);

        return SelectFilter::make($name)
            ->options($enums->all());
    }
}
