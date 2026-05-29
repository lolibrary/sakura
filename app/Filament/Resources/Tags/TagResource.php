<?php

namespace App\Filament\Resources\Tags;

use App\Filament\Resources\Tags\Pages\ManageTags;
use App\Filament\Resources\TranslatableLookupResource;
use App\Models\Tag;
use BackedEnum;
use Filament\Support\Icons\Heroicon;

class TagResource extends TranslatableLookupResource
{
    protected static ?string $model = Tag::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Tags';

    public static function getPages(): array
    {
        return [
            'index' => ManageTags::route('/'),
        ];
    }
}
