<?php

namespace App\Filament\Resources\Colors;

use App\Filament\Resources\Colors\Pages\ManageColors;
use App\Filament\Resources\TranslatableLookupResource;
use App\Models\Color;
use BackedEnum;
use Filament\Support\Icons\Heroicon;

class ColorResource extends TranslatableLookupResource
{
    protected static ?string $model = Color::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Colors';

    public static function getPages(): array
    {
        return [
            'index' => ManageColors::route('/'),
        ];
    }
}
