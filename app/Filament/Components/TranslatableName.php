<?php

namespace App\Filament\Components;

use Doriiaan\FilamentAstrotomic\Schemas\Components\TranslatableTabs;
use Doriiaan\FilamentAstrotomic\TranslatableTab;
use Filament\Forms\Components\TextInput;

class TranslatableName
{
    public static function make(string $name = 'name'): TranslatableTabs
    {
        return TranslatableTabs::make()
            ->localeTabSchema(fn (TranslatableTab $tab) => [
                TextInput::make($tab->makeName($name))
                    ->required($tab->isMainLocale())
                    ->maxLength(100),
            ]);
    }
}
