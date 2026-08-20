<?php

namespace App\Filament\Resources\Items\Schemas;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Color;
use App\Models\Feature;
use App\Models\Item;
use App\Models\Tag;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\EmptyState;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontFamily;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;
use Relaticle\Comments\Filament\Infolists\Components\CommentsEntry;

class ItemInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->contained(false)
                    ->columnSpanFull()
                    ->columns(3)
                    ->schema([
                        TextEntry::make('id')
                            ->label('ID')
                            ->fontFamily(FontFamily::Mono)
                            ->copyable()
                            ->icon(Heroicon::OutlinedDocumentDuplicate)
                            ->iconPosition(IconPosition::After),
                        TextEntry::make('slug')
                            ->fontFamily(FontFamily::Mono)
                            ->copyable()
                            ->icon(Heroicon::OutlinedDocumentDuplicate)
                            ->iconPosition(IconPosition::After),
                        TextEntry::make('url')
                            ->label('Preview Link')
                            ->url(fn (Item $record) => $record->url, shouldOpenInNewTab: true)
                            ->icon(Heroicon::OutlinedArrowTopRightOnSquare)
                            ->iconPosition(IconPosition::After),
                    ]),

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
                            ->defaultImageUrl(cdn_link('images/default.png'))
                            ->checkFileExistence(false),

                        Section::make()
                            ->columns(2)
                            ->columnSpan(2)
                            ->schema([
                                TextEntry::make('english_name'),
                                TextEntry::make('foreign_name')
                                    ->label('Original name')
                                    ->placeholder('None'),
                                TextEntry::make('brand.name')
                                    ->name('Brand')
                                    ->badge(),
                                TextEntry::make('status')->badge(),
                                TextEntry::make('year')
                                    ->fontFamily(FontFamily::Mono)
                                    ->placeholder('Unknown'),
                                TextEntry::make('duplicate_url')
                                    ->label('Duplicate of')
                                    ->iconPosition(IconPosition::After)
                                    ->icon(Heroicon::OutlinedArrowTopRightOnSquare)
                                    ->state(fn (Item $record) => $record->duplicate_url)
                                    ->url(fn (Item $record) => $record->duplicate_url)
                                    ->visible(fn (Item $record) => $record->duplicate()),
                                TextEntry::make('price_details.formatted')
                                    ->label('Price')
                                    ->placeholder('Unknown'),
                                TextEntry::make('product_number')
                                    ->fontFamily(FontFamily::Mono)
                                    ->placeholder('Unknown'),

                                Section::make()
                                    ->contained(false)
                                    ->columnSpanFull()
                                    ->columns(2)
                                    ->schema([
                                        TextEntry::make('submitter.username')
                                            ->name('submitter')
                                            ->badge()
                                            ->color(fn (Item $record) => $record->submitter?->level->getColor())
                                            ->icon(fn (Item $record) => $record->submitter?->level->getIcon())
                                            ->tooltip(fn (Item $record) => $record->submitter?->level->getDescription()),
                                        TextEntry::make('publisher.username')
                                            ->name('publisher')
                                            ->placeholder('No Publisher')
                                            ->badge()
                                            ->color(fn (?Item $record) => $record?->publisher?->level->getColor())
                                            ->icon(fn (?Item $record) => $record?->publisher?->level->getIcon())
                                            ->tooltip(fn (?Item $record) => $record?->publisher?->level->getDescription()),
                                    ]),
                            ])->contained(false),
                    ]),

                Section::make('Additional Images')
                    ->columnSpanFull()
                    ->columns(6)
                    ->schema(function (Item $record) {
                        return collect($record->images)
                            ->filter()
                            ->map(fn (string $image) => ImageEntry::make('images')
                                ->checkFileExistence(false)
                                ->name('')
                                ->columnSpan(1)
                                ->state($image)
                                ->disk('s3public')
                                ->visibility('public')
                                ->columnSpanFull()
                                ->url(Storage::cloud()->url($image)),
                            )->all();
                    }, ),

                Section::make()
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema(function (Item $record) {
                        return [
                            Section::make('Categories')
                                ->contained(false)
                                ->columns(1)
                                ->schema(fn () => [
                                    TextEntry::make('categories')
                                        ->hiddenLabel()
                                        ->formatStateUsing(fn (Category $state) => $state->name)
                                        ->badge(),
                                ]),
                            Section::make('Features')
                                ->contained(false)
                                ->columns(1)
                                ->schema(fn () => [
                                    TextEntry::make('features')
                                        ->hiddenLabel()
                                        ->formatStateUsing(fn (Feature $state) => $state->name)
                                        ->badge(),
                                ]),
                            Section::make('Tags')
                                ->contained(false)
                                ->columns(1)
                                ->schema(fn () => [
                                    TextEntry::make('tags')
                                        ->hiddenLabel()
                                        ->formatStateUsing(fn (Tag $state) => $state->name)
                                        ->badge()
                                        ->color(fn (Tag $state) => $state->visibility->getColor())
                                        ->tooltip(fn (Tag $state) => "$state->name: {$state->visibility->getLabel()}")
                                        ->icon(fn (Tag $state) => $state->visibility->getIcon()),
                                ]),
                            Section::make('Colorways')
                                ->contained(false)
                                ->columns(1)
                                ->schema(fn () => [
                                    TextEntry::make('colors')
                                        ->hiddenLabel()
                                        ->formatStateUsing(fn (Color $state) => $state->name)
                                        ->badge(),
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
                                ),
                        ];

                    }),

                Section::make('Notes')
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('notes')
                            ->hiddenLabel()
                            ->html()
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ]),

                Section::make('Internal Notes')
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('internal_notes')
                            ->hiddenLabel()
                            ->html()
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ]),

                KeyValueEntry::make('metadata')
                    ->columnSpanFull()
                    ->keyLabel('Key')
                    ->valueLabel('Value')
                    ->visible(fn () => auth()->user()->developer()),

                Section::make('Timestamps')
                    ->columnSpanFull()
                    ->columns(3)
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Created')
                            ->badge()
                            ->dateTime()
                            ->placeholder('-')
                            ->helperText('When a draft was initially made.'),
                        TextEntry::make('updated_at')
                            ->label('Updated')
                            ->dateTime()
                            ->badge()
                            ->placeholder('-')
                            ->helperText('When an entry was last edited.'),
                        TextEntry::make('published_at')
                            ->label('Published')
                            ->badge()
                            ->dateTime()
                            ->placeholder('Not Published')
                            ->helperText('The time an entry was pushed live.'),
                    ]),

                Section::make('Comments')
                    ->columnSpanFull()
                    ->schema([
                        CommentsEntry::make('comments')
                            ->columnSpanFull()
                            ->hiddenLabel(),
                    ]),
            ]);
    }
}
