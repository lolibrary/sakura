<?php

namespace App\Filament\Resources\Categories\Schemas;

use App\Filament\Components\FileUpload;
use App\Filament\Components\TranslatableName;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TranslatableName::make(),
                Section::make()
                    ->schema([
                        TextInput::make('slug')
                            ->maxLength(255)
                            ->string()
                            ->alphaDash()
                            ->doesntEndWith('-')
                            ->doesntStartWith('-')
                            ->required(),
                        TextInput::make('order')
                            ->numeric()
                            ->minValue(-2000)
                            ->maxValue(2000)
                            ->required()
                            ->hint('-2000 to 2000')
                            ->helperText('Higher values show first on the homepage.')
                    ]),
                FileUpload::make('image')
                    ->directory('categories'),
            ]);
    }
}
