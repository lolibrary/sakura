<?php

namespace App\Filament\Resources\Brands\Schemas;

use App\Models\Brand;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Placeholder;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Image;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BrandInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('slug'),
                        TextEntry::make('short_name'),
                    ])
                    ->contained(false),

                Section::make()
                    ->schema([
                        ImageEntry::make('image')
                            ->alignCenter()
                            ->disk('s3public')
                            ->label('Current Image')
                            ->visibility('public')
                            ->checkFileExistence(false)
                            ->alt(fn(Brand $brand) => "Brand image for $brand->name"),
                    ]),

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
