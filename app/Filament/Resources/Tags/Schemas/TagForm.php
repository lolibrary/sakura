<?php

namespace App\Filament\Resources\Tags\Schemas;

use App\Enums\Visibility;
use Doriiaan\FilamentAstrotomic\Schemas\Components\TranslatableTabs;
use Doriiaan\FilamentAstrotomic\TranslatableTab;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TranslatableTabs::make()
                    ->localeTabSchema(fn (TranslatableTab $tab) => [
                        TextInput::make($tab->makeName('name'))
                            ->inlineLabel()
                            ->required($tab->isMainLocale())
                            ->maxLength(100),
                    ]),
                Section::make()
                    ->components([
                        TextInput::make('slug')
                            ->required(),
                        Select::make('visibility')
                            ->options(Visibility::options())
                            ->required()
                    ])
            ]);
    }
}
