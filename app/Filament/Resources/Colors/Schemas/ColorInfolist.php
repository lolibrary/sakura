<?php

namespace App\Filament\Resources\Colors\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontFamily;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Icons\Heroicon;

class ColorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('Localized Name'),
                TextEntry::make('slug')
                    ->copyable()
                    ->fontFamily(FontFamily::Mono)
                    ->icon(Heroicon::OutlinedDocumentDuplicate)
                    ->iconPosition(IconPosition::After),
                TextEntry::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->badge()
                    ->disabled(),
                TextEntry::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
                    ->badge()
                    ->disabled()
                    ->placeholder('-'),
            ]);
    }
}
