<?php

namespace App\Filament\Components\Table;

use App\Models\Item;
use Filament\Tables\Columns\TextColumn;

class UsernameColumn
{
    public static function make(string $name): TextColumn
    {
        return TextColumn::make($name)
            ->sortable()
            ->searchable()
            ->toggleable()
            ->badge()
            ->color(fn (Item $record) => $record->submitter?->level->getColor())
            ->icon(fn (Item $record) => $record->submitter?->level->getIcon())
            ->tooltip(fn (Item $record) => $record->submitter?->level->getDescription());
    }
}
