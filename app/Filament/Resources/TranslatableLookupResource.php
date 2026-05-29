<?php

namespace App\Filament\Resources;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

abstract class TranslatableLookupResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = 'Library';

    protected static ?string $recordTitleAttribute = 'name';

    protected static string $slugRegex = '/[a-z0-9][a-z0-9\-]{1,50}/u';

    protected static int $slugMaxLength = 50;

    protected static bool $nameIsRequired = false;

    public static function form(Schema $schema): Schema
    {
        return $schema->components(static::getFormComponents());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->modifyQueryUsing(fn (Builder $query) => $query->orderByTranslation('name'))
            ->columns(static::getTableColumns())
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with('translations')
            ->orderByTranslation('name');
    }

    protected static function getFormComponents(): array
    {
        return [
            ...static::getBeforeSlugComponents(),
            TextInput::make('slug')
                ->required()
                ->maxLength(static::$slugMaxLength)
                ->regex(static::$slugRegex)
                ->unique(
                    table: app(static::getModel())->getTable(),
                    column: 'slug',
                    ignoreRecord: true,
                ),
            ...static::getAfterSlugComponents(),
            static::getTranslationsRepeater(),
            ...static::getAfterTranslationComponents(),
        ];
    }

    protected static function getBeforeSlugComponents(): array
    {
        return [];
    }

    protected static function getAfterSlugComponents(): array
    {
        return [];
    }

    protected static function getAfterTranslationComponents(): array
    {
        return [];
    }

    protected static function getTableColumns(): array
    {
        return [
            ...static::getLeadingTableColumns(),
            TextColumn::make('name')
                ->searchable(query: function (Builder $query, string $search): Builder {
                    return $query->where(function (Builder $query) use ($search) {
                        $query->whereTranslationLike('name', "%{$search}%")
                            ->orWhere('slug', 'like', "%{$search}%");
                    });
                })
                ->sortable(query: fn (Builder $query, string $direction): Builder => $query->orderByTranslation('name', $direction)),
            ...static::getTrailingTableColumns(),
            TextColumn::make('created_at')
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    protected static function getLeadingTableColumns(): array
    {
        return [];
    }

    protected static function getTrailingTableColumns(): array
    {
        return [
            TextColumn::make('slug')
                ->searchable()
                ->toggleable(),
        ];
    }

    protected static function getTranslationsRepeater(): Repeater
    {
        return Repeater::make('translations')
            ->relationship()
            ->schema([
                Select::make('locale')
                    ->options(static::getLocaleOptions())
                    ->required()
                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                    ->searchable(),
                TextInput::make('name')
                    ->required(static::$nameIsRequired)
                    ->maxLength(255),
            ])
            ->default(static::getDefaultTranslations())
            ->minItems(1)
            ->columns(2)
            ->columnSpanFull()
            ->itemLabel(function (array $state): ?string {
                $locale = $state['locale'] ?? null;

                if ($locale === null) {
                    return null;
                }

                return static::getLocaleOptions()[$locale] ?? $locale;
            });
    }

    protected static function getDefaultTranslations(): array
    {
        $defaults = [];

        foreach (array_keys(static::getLocaleOptions()) as $locale) {
            $defaults[] = [
                'locale' => $locale,
                'name' => null,
            ];
        }

        return $defaults;
    }

    protected static function getLocaleOptions(): array
    {
        return array_filter(
            config('app.locales', []),
            fn ($label, $locale) => $locale !== 'en_US',
            ARRAY_FILTER_USE_BOTH,
        );
    }
}
