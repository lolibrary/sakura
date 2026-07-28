<?php

namespace App\Filament\Resources\Features;

use App\Filament\Resources\Features\Pages\CreateFeature;
use App\Filament\Resources\Features\Pages\EditFeature;
use App\Filament\Resources\Features\Pages\ListFeatures;
use App\Filament\Resources\Features\Pages\ViewFeature;
use App\Filament\Resources\Features\Schemas\FeatureForm;
use App\Filament\Resources\Features\Schemas\FeatureInfolist;
use App\Filament\Resources\Features\Tables\FeaturesTable;
use App\Models\Feature;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FeatureResource extends Resource
{
    protected static ?string $model = Feature::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFlag;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 4;

    protected static string | \UnitEnum | null $navigationGroup = 'Library';

    public static function form(Schema $schema): Schema
    {
        return FeatureForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FeatureInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeaturesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFeatures::route('/'),
            'create' => CreateFeature::route('/create'),
            'view' => ViewFeature::route('/{record}'),
            'edit' => EditFeature::route('/{record}/edit'),
        ];
    }
}
