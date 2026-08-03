<?php

namespace App\Filament\Resources\Attributes\Schemas;

use App\Filament\Components\TranslatableName;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AttributeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TranslatableName::make(),
                TextInput::make('slug')
                    ->required(),
            ]);
    }
}
