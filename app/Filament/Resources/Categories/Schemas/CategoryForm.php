<?php

namespace App\Filament\Resources\Categories\Schemas;

use App\Filament\Components\TranslatableName;
use App\Filament\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TranslatableName::make(),
                TextInput::make('slug')->required(),
                FileUpload::make('image')
                    ->directory('categories'),
            ]);
    }
}
