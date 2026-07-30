<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->required(),
                TextInput::make('short_name')
                    ->required(),
                Textarea::make('description')
                    ->default('')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->openable()
                    ->previewable()
                    ->disk('s3public')
                    ->directory('brands')
                    ->visibility('public')
                    ->image()
                    ->required(),
            ]);
    }
}
