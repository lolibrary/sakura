<?php

namespace App\Filament\Resources\Categories\Schemas;

use Doriiaan\FilamentAstrotomic\Schemas\Components\TranslatableTabs;
use Doriiaan\FilamentAstrotomic\TranslatableTab;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CategoryForm
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
                TextInput::make('slug')->required(),
                FileUpload::make('image')
                    ->openable()
                    ->previewable()
                    ->disk('s3public')
                    ->visibility('public')
                    ->directory('categories')
                    ->required()
                    ->image()
                    ->preventFilePathTampering(),
            ]);
    }
}
