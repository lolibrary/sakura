<?php

namespace App\Filament\Resources\Brands\Schemas;

use App\Models\Brand;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontFamily;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Icons\Heroicon;

class BrandInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
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

                Section::make()
                    ->schema([
                        TextEntry::make('name')
                            ->label('Localized Name'),
                        TextEntry::make('slug')
                            ->copyable()
                            ->fontFamily(FontFamily::Mono)
                            ->icon(Heroicon::OutlinedDocumentDuplicate)
                            ->iconPosition(IconPosition::After),
                        TextEntry::make('short_name')
                            ->copyable()
                            ->fontFamily(FontFamily::Mono)
                            ->icon(Heroicon::OutlinedDocumentDuplicate)
                            ->iconPosition(IconPosition::After),
                    ])
                    ->contained(false),

                TextEntry::make('created_at')
                    ->dateTime()
                    ->badge()
                    ->disabled(),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->badge()
                    ->disabled()
                    ->placeholder('-'),
            ]);
    }
}
