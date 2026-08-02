<?php

namespace App\Filament\Resources\Categories\Schemas;

use App\Models\Category;
use Doriiaan\FilamentAstrotomic\Schemas\Components\TranslatableTabs;
use Doriiaan\FilamentAstrotomic\TranslatableTab;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontFamily;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Icons\Heroicon;

class CategoryInfolist
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
                            ->alt(fn(Category $category) => "Brand image for $category->name"),
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
                    ])
                    ->contained(false),

                TextEntry::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->badge()
                    ->disabled(),
                TextEntry::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
                    ->badge()
                    ->disabled()
                    ->placeholder('-'),
            ]);
    }
}
