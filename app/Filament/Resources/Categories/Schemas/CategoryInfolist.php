<?php

namespace App\Filament\Resources\Categories\Schemas;

use App\Models\Category;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('slug'),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->disabled(),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->disabled()
                            ->placeholder('-'),
                    ])
                    ->contained(false),

                Section::make()
                    ->schema([
                        ImageEntry::make('image')
                            ->alignCenter()
                            ->disk('s3public')
                            ->label('Current Image')
                            ->visibility('public')
                            ->alt(fn(Category $category) => "Brand image for $category->name"),
                    ]),
            ]);
    }
}
