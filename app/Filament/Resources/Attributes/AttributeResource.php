<?php

namespace App\Filament\Resources\Attributes;

use App\Filament\RelationManagers\ItemsRelationManager;
use App\Filament\Resources\Attributes\Pages\CreateAttribute;
use App\Filament\Resources\Attributes\Pages\EditAttribute;
use App\Filament\Resources\Attributes\Pages\ListAttributes;
use App\Filament\Resources\Attributes\Pages\ViewAttribute;
use App\Filament\Resources\Attributes\Schemas\AttributeForm;
use App\Filament\Resources\Attributes\Schemas\AttributeInfolist;
use App\Filament\Resources\Attributes\Tables\AttributesTable;
use App\Models\Attribute;
use BackedEnum;
use Doriiaan\FilamentAstrotomic\Resources\Concerns\ResourceTranslatable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AttributeResource extends Resource
{
    use ResourceTranslatable;

    protected static ?string $model = Attribute::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 7;

    protected static string|\UnitEnum|null $navigationGroup = 'Library';

    protected static bool $isGloballySearchable = true;

    public static function form(Schema $schema): Schema
    {
        return AttributeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AttributeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AttributesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            ItemsRelationManager::make(),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAttributes::route('/'),
            'create' => CreateAttribute::route('/create'),
            'view' => ViewAttribute::route('/{record}'),
            'edit' => EditAttribute::route('/{record}/edit'),
        ];
    }

    protected static function applyGlobalSearchAttributeConstraints(Builder $query, string $search): void
    {
        $query->whereTranslationLike('name', '%' . $search . '%');
    }

    public static function getModelLabel(): string
    {
        return trans('ui.item.attribute');
    }

    public static function getPluralModelLabel(): string
    {
        return trans('ui.attributes');
    }
}
