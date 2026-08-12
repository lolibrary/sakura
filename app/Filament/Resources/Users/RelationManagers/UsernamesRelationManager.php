<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Filament\Components\Table\DateColumn;
use App\Helpers\DefaultRule;
use App\Models\Username;
use Filament\Actions\Action;
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
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class UsernamesRelationManager extends RelationManager
{
    protected static string $relationship = 'usernames';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('username')
                ->required()
                ->rules(DefaultRule::username())
                ->autocomplete(false)
                ->autocapitalize(false)
                ->unique('usernames')
        ]);
    }

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
                IconColumn::make('active')
                    ->boolean()
                    ->label('Active')
                    ->state(fn(Username $u) => $u->username === $u->user->username)
            ])
            ->filters([
                TrashedFilter::make()
                    ->default(),
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                Action::make('assign')
                    ->icon(Heroicon::OutlinedSquaresPlus)
                    ->color('light')
                    ->visible(fn(Username $record) => $record->username !== $record->user->username)
                    ->action(fn (Username $record) => $record->user->update(['username' => $record->username])),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(fn(Builder $query) => $query
                ->withoutGlobalScopes([
                    SoftDeletingScope::class,
                ]));
    }
}
