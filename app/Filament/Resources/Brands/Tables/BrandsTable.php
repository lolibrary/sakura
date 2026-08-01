<?php

namespace App\Filament\Resources\Brands\Tables;

use App\Filament\Components\Table\DateColumn;
use App\Filament\Components\Table\TranslatableTextColumn;
use App\Filament\Components\Table\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BrandsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TranslatableTextColumn::make(),
                TextColumn::make('short_name')
                    ->searchable()
                    ->sortable(),
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
