<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Filament\Components\Table\DateColumn;
use App\Models\Username;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UsernamesRelationManager extends RelationManager
{
    protected static string $relationship = 'usernames';

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('username'),
                DateColumn::make('created_at'),
                DateColumn::make('updated_at'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('username')
            ->columns([
                TextColumn::make('username')
                    ->searchable()
                    ->sortable(),
                DateColumn::make('created_at')
                    ->toggleable(false)
                    ->toggledHiddenByDefault(false)
                    ->sortable(),
                DateColumn::make('updated_at')
                    ->toggleable(false)
                    ->toggledHiddenByDefault(false)
                    ->sortable(),
                IconColumn::make('deleted_at')
                    ->boolean()
                    ->label('Deleted')
                    ->state(fn (Username $u) => $u->trashed())
            ])
            ->filters([
                TrashedFilter::make()
                    ->default(),
            ])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query
                ->withoutGlobalScopes([
                    SoftDeletingScope::class,
                ]));
    }
}
