<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')->required(),
                FileUpload::make('image')
                    ->openable()
                    ->previewable()
                    ->disk('s3public')
                    ->visibility('public')
                    ->directory('categories')
                    ->required()
                    ->image(),
            ]);
    }
}
