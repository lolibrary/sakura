<?php

namespace App\Filament\Resources\Categories\Schemas;

use App\Filament\Components\TranslatableName;
use Filament\Forms\Components\FileUpload;
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
                            ->hint('alpha-dash')
                            ->maxLength(255)
                            ->string()
                            ->alphaDash()
                            ->doesntEndWith('-')
                            ->doesntStartWith('-')
                            ->required()
                            ->helperText('URL slug for this category, categories/{slug}.'),
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
                    ->label('Category Image')
                    ->disk('s3public')
                    ->visibility('public')
                    ->directory('categories')
                    ->previewable()
                    ->openable()
                    ->maxSize(1024 * 3)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg'])
                    ->helperText('Acceptable upload types: JPEG, PNG, SVG, WEBP. 3MB limit.')
                    ->preventFilePathTampering(),
            ]);
    }
}
