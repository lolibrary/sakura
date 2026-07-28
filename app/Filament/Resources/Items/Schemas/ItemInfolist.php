<?php

namespace App\Filament\Resources\Items\Schemas;

use App\Models\Image;
use App\Models\Item;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\SelectColumn;
use Laravel\Nova\Fields\Select;

class ItemInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make()
                    ->columns(3)
                    ->columnSpanFull()
                    ->schema([
                        ImageEntry::make('image')
                            ->visibility('public')
                            ->disk('s3public')
                            ->alignCenter()
                            ->imageWidth(250)
                            ->imageHeight(320)
                            ->defaultImageUrl(cdn_link('images/default.png')),

                        Section::make()
                            ->schema([
                                TextEntry::make('english_name'),
                                TextEntry::make('foreign_name')
                                    ->placeholder('-'),
                                TextEntry::make('brand.name')
                                    ->name('Brand'),
                                TextEntry::make('submitter.username')
                                    ->name('submitter'),
                                TextEntry::make('status')
                                    ->badge()
                                    ->state(fn (Item $record) => Item::STATES[$record->status] ?? 'unknown')
                                    ->colors(Item::COLORS),
                                TextEntry::make('created_at')
                                    ->name('Created')
                                    ->date(),
                            ])->contained(false),

                        Section::make()
                            ->schema([
                                TextEntry::make('id')
                                    ->label('ID'),
                                TextEntry::make('slug'),
                                TextEntry::make('year')
                                    ->numeric()
                                    ->placeholder('-'),
                                TextEntry::make('product_number')
                                    ->placeholder('-'),
                                TextEntry::make('publisher.username')
                                    ->name('publisher')
                                    ->placeholder('-'),
                                TextEntry::make('published_at')
                                    ->name('Published')
                                    ->date()
                                    ->placeholder('-'),
                            ])->contained(false),
                    ]),

                Section::make()
                    ->columnSpanFull()
                    ->schema([
                        ImageEntry::make('images')
                            ->columnSpanFull()
                            ->disk('s3public')
                            ->visibility('public'),
                    ]),

                Section::make()
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        RepeatableEntry::make('categories')
                            ->schema([
                                TextEntry::make('name')->badge()->name('')]),
                        RepeatableEntry::make('features')
                            ->schema([TextEntry::make('name')->badge()->name('')]),
                        RepeatableEntry::make('colors')
                            ->schema([TextEntry::make('name')->badge()->name('')]),
                        RepeatableEntry::make('tags')
                            ->schema([TextEntry::make('name')->badge()->name('')]),
                    ]),

                Section::make()
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('notes')
                            ->html()
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ]),

                Section::make()
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('internal_notes')
                            ->html()
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ]),

                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('full_price')
                    ->placeholder('-'),


            ]);
    }
}
