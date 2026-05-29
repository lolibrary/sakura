<?php

namespace App\Filament\Resources\Attributes;

use App\Filament\Resources\Attributes\Pages\ManageAttributes;
use App\Filament\Resources\TranslatableLookupResource;
use App\Models\Attribute;
use BackedEnum;
use Filament\Support\Icons\Heroicon;

class AttributeResource extends TranslatableLookupResource
{
    protected static ?string $model = Attribute::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Attributes';

    protected static bool $nameIsRequired = false;

    public static function getPages(): array
    {
        return [
            'index' => ManageAttributes::route('/'),
        ];
    }
}
