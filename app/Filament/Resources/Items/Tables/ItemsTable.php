<?php

namespace App\Filament\Resources\Items\Tables;

use App\Enums\Status;
use App\Models\Item;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->disk('s3public')
                    ->visibility('public')
                    ->square()
                    ->checkFileExistence(false),
                TextColumn::make('english_name')
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                TextColumn::make('foreign_name')
                    ->searchable()
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('year')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('submitter')
                    ->state(fn(Item $record) => $record->submitter?->username ?? '')
                    ->name('Submitter')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('status')
                    ->sortable()
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        Status::Draft->value => Status::Draft->getName(),
                        Status::ReadyForReview->value => Status::ReadyForReview->getName(),
                        Status::ChangesRequested->value => Status::ChangesRequested->getName(),
                        Status::Published->value => Status::Published->getName(),
                    ]),
                SelectFilter::make('published_by')
                    ->query(fn (Builder $query, array $data) => match ($data['value']) {
                        'me' => $query->where('publisher_id', auth()->id()),
                        'others' => $query->whereNot('publisher_id', auth()->id()),
                        default => $query,
                    })
                    ->options([
                        'me' => 'Me',
                        'others' => 'Others',
                    ]),
                Filter::make('only_my_entries')
                    ->toggle()
                    ->query(fn(Builder $query) => $query->where('user_id', auth()->id())),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
