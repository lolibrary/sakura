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
                    ->searchable()
                    ->sortable()
                    ->state(fn (User $record) => $record->display_name)
                    ->visible(fn() => auth()->user()->admin())
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('username')
                    ->searchable()
                    ->sortable(),
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
            ->paginationPageOptions([25, 50, 100, 200])
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
