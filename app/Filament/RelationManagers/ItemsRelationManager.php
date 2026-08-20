<?php

namespace App\Filament\RelationManagers;

use App\Enums\Status;
use App\Filament\Components\Filters\EnumFilter;
use App\Filament\Components\Table\DateColumn;
use App\Filament\Components\Table\ImageColumn;
use App\Filament\Components\Table\UsernameColumn;
use App\Filament\Query\TranslatedRelation;
use App\Filament\Resources\Items\ItemResource;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $relatedResource = ItemResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->toggleable()->circular(),
                TextColumn::make('english_name')
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                TextColumn::make('foreign_name')
                    ->searchable()
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('brand.slug')
                    ->badge()
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->limit(40),
                TextColumn::make('year')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                UsernameColumn::make('submitter.username')->label('Submitter'),
                TextColumn::make('status')->sortable()->badge()->toggleable(),
                DateColumn::make('created_at')
                    ->sortable(['items.created_at']),
                DateColumn::make('updated_at')
                    ->sortable(['items.updated_at']),
            ])
            ->filters([
                EnumFilter::make('status', [
                    Status::Duplicate,
                    Status::Inactive,
                    Status::Draft,
                    Status::ReadyForReview,
                    Status::ChangesRequested,
                    Status::Published,
                    Status::Retracted,
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
                SelectFilter::make('brand')
                    ->relationship(
                        name: 'brand',
                        titleAttribute: 'name',
                        modifyQueryUsing: TranslatedRelation::make('brand'),
                    ),
                Filter::make('only_my_entries')
                    ->toggle()
                    ->query(fn (Builder $query) => $query->where('user_id', auth()->id())),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
