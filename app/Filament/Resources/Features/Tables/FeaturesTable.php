<?php

namespace App\Filament\Resources\Features\Tables;

use App\Filament\Components\Table\DateColumn;
use App\Filament\Components\Table\TranslatableTextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FeaturesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TranslatableTextColumn::make(),
                TextColumn::make('slug')
                    ->sortable()
                    ->searchable(),
                DateColumn::make('created_at'),
                DateColumn::make('updated_at'),
            ])
            ->paginationPageOptions([10, 25, 50, 100])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
