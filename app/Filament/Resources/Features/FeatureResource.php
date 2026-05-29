<?php

namespace App\Filament\Resources\Features;

use App\Filament\Resources\Features\Pages\ManageFeatures;
use App\Filament\Resources\TranslatableLookupResource;
use App\Models\Feature;
use BackedEnum;
use Filament\Support\Icons\Heroicon;

class FeatureResource extends TranslatableLookupResource
{
    protected static ?string $model = Feature::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Features';

    public static function getPages(): array
    {
        return [
            'index' => ManageFeatures::route('/'),
        ];
    }
}
