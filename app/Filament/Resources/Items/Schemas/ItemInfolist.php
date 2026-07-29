<?php

namespace App\Filament\Resources\Items\Schemas;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Color;
use App\Models\Feature;
use App\Models\Image;
use App\Models\Item;
use App\Models\Tag;
use Filament\Infolists\Components\CodeEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\EmptyState;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontFamily;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;

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
                            ->disk('s3public')
                            ->visibility('public')
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
                                    ->name('Brand')
                                    ->badge(),
                                TextEntry::make('submitter.username')
                                    ->name('submitter')
                                    ->badge(),
                                TextEntry::make('status')->badge(),
                                TextEntry::make('created_at')
                                    ->name('Created')
                                    ->date(),
                            ])->contained(false),

                        Section::make()
                            ->schema([
                                TextEntry::make('id')
                                    ->label('ID')
                                    ->fontFamily( FontFamily::Mono)
                                    ->copyable()
                                    ->icon(Heroicon::OutlinedDocumentDuplicate),
                                TextEntry::make('slug')
                                    ->fontFamily( FontFamily::Mono)
                                    ->copyable()
                                    ->icon(Heroicon::OutlinedDocumentDuplicate),
                                TextEntry::make('year')
                                    ->placeholder('-'),
                                TextEntry::make('product_number')
                                    ->placeholder('-'),
                                TextEntry::make('publisher.username')
                                    ->name('publisher')
                                    ->placeholder('-')
                                    ->badge(),
                                TextEntry::make('url')
                                    ->label('Preview Link')
                                    ->url(fn(Item $record) => $record->url, shouldOpenInNewTab: true)
                                    ->icon(Heroicon::OutlinedArrowTopRightOnSquare),
                            ])->contained(false),
                    ]),

                Section::make('Additional Images')
                    ->columnSpanFull()
                    ->columns(6)
                    ->schema(function (Item $record) {
                        return collect($record->images)
                            ->map(fn(string $image) => ImageEntry::make('images')
                                ->checkFileExistence(false)
                                ->name('')
                                ->columnSpan(1)
                                ->state($image)
                                ->disk('s3public')
                                ->visibility('public')
                                ->columnSpanFull()
                                ->url(Storage::cloud()->url($image)),
                            )->all();
                    },),

                Section::make('Relations')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema(function (Item $record) {
                        return [
                            Section::make('Categories')
                                ->contained(false)
                                ->columns(4)
                                ->schema(fn () => [
                                    TextEntry::make('name')
                                        ->state($record->categories->map->name->all())
                                        ->badge()
                                        ->name(''),
                                ]),
                            Section::make('Features')
                                ->contained(false)
                                ->columns(4)
                                ->schema(fn () => [
                                    TextEntry::make('name')
                                        ->state($record->features->map->name->all())
                                        ->badge()
                                        ->name(''),
                                ]),
                            Section::make('Tags')
                                ->contained(false)
                                ->columns(4)
                                ->schema(fn () => [
                                    TextEntry::make('name')
                                        ->state($record->tags->map->name->all())
                                        ->badge()
                                        ->name(''),
                                ]),
                            Section::make('Colorways')
                                ->contained(false)
                                ->columns(4)
                                ->schema(fn () => [
                                    TextEntry::make('name')
                                        ->state($record->colors->map->name->all())
                                        ->badge()
                                        ->name(''),
                                ]),
                        ];
                    }),

                Section::make()
                    ->contained(false)
                    ->columnSpanFull()
                    ->schema(function (Item $record) {
                        if ($record->attributes->count() === 0) {
                            return [
                                EmptyState::make('No Attributes')
                                    ->icon(Heroicon::OutlinedDocumentText),
                            ];
                        }

                        return [
                            KeyValueEntry::make('attributes')
                                ->name('')
                                ->keyLabel('Attribute')
                                ->valueLabel('Value')
                                ->state(
                                    $record->attributes
                                        ->mapWithKeys(fn (Attribute $attr) => [
                                            $attr->name => $attr->pivot->value,
                                        ])
                                )
                        ];

                    }),

                Section::make('Notes')
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('notes')
                            ->name('')
                            ->html()
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ]),

                Section::make('Internal Notes')
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('internal_notes')
                            ->name('')
                            ->html()
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ]),

                Section::make('Timestamps')
                    ->columnSpanFull()
                    ->columns(3)
                    ->schema([
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->badge()
                            ->placeholder('-'),
                        TextEntry::make('created_at')
                            ->badge()
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('published_at')
                            ->badge()
                            ->dateTime()
                            ->placeholder('-'),
                    ]),


            ]);
    }
}
