<?php

namespace App\Filament\Resources\Brands\Schemas;

use Doriiaan\FilamentAstrotomic\Schemas\Components\TranslatableTabs;
use Doriiaan\FilamentAstrotomic\TranslatableTab;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->contained(false)
                    ->schema([
                        TranslatableTabs::make()
                            ->localeTabSchema(fn (TranslatableTab $tab) => [
                                TextInput::make($tab->makeName('name'))
                                    ->required($tab->isMainLocale())
                                    ->maxLength(100),
                            ]),
                        Section::make()
                            ->schema([
                                TextInput::make('slug')
                                    ->hint('alpha-dash')
                                    ->maxLength(255)
                                    ->string()
                                    ->alphaDash()
                                    ->doesntEndWith('-')
                                    ->doesntStartWith('-')
                                    ->required()
                                    ->helperText('URL slug for this brand, brands/{slug}.'),
                                TextInput::make('short_name')
                                    ->hint('alpha-dash')
                                    ->maxLength(255)
                                    ->string()
                                    ->alphaDash()
                                    ->doesntEndWith('-')
                                    ->doesntStartWith('-')
                                    ->required()
                                    ->helperText('Short name for this brand that prefixes item slugs.'),
                                TextInput::make('order')
                                    ->label('Sort order')
                                    ->numeric()
                                    ->minValue(-2000)
                                    ->maxValue(2000)
                                    ->required()
                                    ->hint('-2000 to 2000')
                                    ->helperText('Higher values show first on the homepage.')
                            ]),

                        FileUpload::make('image')
                            ->label('Main Image')
                            ->disk('s3public')
                            ->visibility('public')
                            ->directory('brands')
                            ->previewable()
                            ->openable()
                            ->maxSize(1024 * 3)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg'])
                            ->helperText('Acceptable upload types: JPEG, PNG, SVG, WEBP. 3MB limit.')
                            ->preventFilePathTampering(),
                    ]),
            ]);
    }
}
