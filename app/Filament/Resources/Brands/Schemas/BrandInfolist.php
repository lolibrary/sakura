<?php

namespace App\Filament\Resources\Brands\Schemas;

use App\Models\Brand;
use Filament\Forms\Components\Placeholder;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Image;
use Filament\Schemas\Schema;

class BrandInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('image')
                    ->label('Current Image')
                    ->disk('s3public')
                    ->visibility('public')
                    ->alt(fn(Brand $brand) => "Brand image for $brand->name"),
                TextEntry::make('slug'),
                TextEntry::make('short_name'),
                TextEntry::make('description')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->disabled(),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->disabled()
                    ->placeholder('-'),
            ]);
    }
}
