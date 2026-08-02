<?php

namespace App\Filament\Resources\Users\Tables;

use App\Enums\Level;
use App\Filament\Components\Filters\EnumFilter;
use App\Filament\Components\Table\DateColumn;
use App\Models\User;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('username')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->visible(fn() => auth()->user()->admin()),
                DateColumn::make('created_at'),
                DateColumn::make('updated_at'),
                TextColumn::make('level')
                    ->badge()
                    ->tooltip(fn (User $record) => $record->level->getDescription())
                    ->sortable(),
                IconColumn::make('banned')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('verified')
                    ->boolean()
                    ->sortable()
                    ->toggleable(),
            ])
            ->paginationPageOptions([10, 25, 50, 100])
            ->filters([
                EnumFilter::make('level', Level::cases()),
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
