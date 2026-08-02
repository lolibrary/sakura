<?php

namespace App\Filament\Components\Table;

use Filament\Tables\Columns\TextColumn;

class DateColumn
{
    public static function make(string $name): TextColumn
    {
        return TextColumn::make($name)
            ->dateTime()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true);
    }
}
