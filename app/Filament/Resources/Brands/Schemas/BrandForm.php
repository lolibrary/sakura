<?php

namespace App\Filament\Resources\Brands\Schemas;

use Doriiaan\FilamentAstrotomic\Schemas\Components\TranslatableTabs;
use Doriiaan\FilamentAstrotomic\TranslatableTab;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TranslatableTabs::make()
                    ->localeTabSchema(fn (TranslatableTab $tab) => [
                        TextInput::make($tab->makeName('name'))
                            ->required($tab->isMainLocale())
                            ->maxLength(100),
                    ]),
                Section::make()
                    ->contained(false)
                    ->schema([
                        TextInput::make('slug')
                            ->required(),
                        TextInput::make('short_name')
                            ->required(),
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
                    ->helperText("Acceptable upload types: JPEG, PNG, SVG, WEBP. 3MB limit.")
                    ->preventFilePathTampering(),
            ]);
    }
}
