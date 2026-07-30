<?php

namespace App\Filament\Widgets;

use App\Enums\Status;
use App\Models\Item;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class MyQueue extends TableWidget
{
    protected static ?int $sort = 5;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading(trans('resources.queue.title'))
            ->query(fn (): Builder => auth()->user()
                ->items()
                ->where('status', '!=', Status::Published)
                ->getQuery()
            )
            ->columns([
                ImageColumn::make('image')
                    ->disk('s3public')
                    ->visibility('public')
                    ->alignCenter()
                    ->checkFileExistence(false),
                TextColumn::make('english_name')
                    ->formatStateUsing(fn (Item $record) => Str::limit($record->english_name, 40))
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->sortable()
                    ->dateTime()
                    ->placeholder('Never')
                    ->visibleFrom('xl'),
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->sortable()
                    ->dateTime()
                    ->placeholder('Never')
                    ->visibleFrom('lg'),
                TextColumn::make('status')
                    ->sortable()
                    ->badge()
                    ->visibleFrom('xl'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                ViewAction::make()
                    ->url(fn (Item $record): string => route('filament.admin.resources.items.view', $record)),
                EditAction::make()
                    ->url(fn (Item $record): string => route('filament.admin.resources.items.edit', $record)),
            ])
            ->toolbarActions([

            ])
            //->emptyStateHeading('No items right now!')
            ->emptyStateActions([
                CreateAction::make()
                    ->url(fn (): string => route('filament.admin.resources.items.create')),
            ]);
    }
}
