<?php

namespace App\Filament\Components\Table;

use Filament\Tables\Columns\TextColumn;

class TranslatableTextColumn
{
    public static function make(string $name = 'name'): TextColumn
    {
        return TextColumn::make($name)
            ->label('Name')
            ->limitList(1)
            ->sortable(
                query: fn ($query, string $direction) => $query->orderByTranslation($name, $direction)
            )
            ->searchable(
                query: fn ($query, string $search) => $query->whereTranslation(
                    $name, '%'.$search.'%',
                    operator: 'ILIKE',
                )
            );
    }
}
