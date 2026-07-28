<?php

namespace App\Filament\Resources\Features\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FeatureInfolist
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
            ]);
    }
}
