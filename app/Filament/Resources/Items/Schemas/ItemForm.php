<?php

namespace App\Filament\Resources\Items\Schemas;

use App\Filament\Query\TranslatedRelation;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('english_name')
                    ->required()
                    ->helperText('The english name of this item.'),


                TextInput::make('foreign_name')
                    ->helperText('The original/native-language name of this item.'),

                Select::make('brand_id')
                    ->name('Brand')
                    ->required()
                    ->relationship(
                        name: 'brand',
                        titleAttribute: 'name',
                        modifyQueryUsing: TranslatedRelation::make('brand'),
                    )
                    ->helperText('The brand of this item, e.g. Angelic Pretty.'),

                Section::make('Relationships')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([

                        CheckboxList::make('categories')
                            ->extraAttributes([
                                'style' => 'max-height: 330px; overflow-y: scroll'
                            ])
                            ->required()
                            ->minItems(1)
                            ->relationship(
                                titleAttribute: 'name',
                                modifyQueryUsing: TranslatedRelation::make('category'),
                            )
                            ->searchable()
                            ->searchDebounce(500),

                        CheckboxList::make('features')
                            ->extraAttributes([
                                'style' => 'max-height: 330px; overflow-y: scroll'
                            ])
                            ->relationship(
                                titleAttribute: 'name',
                                modifyQueryUsing: TranslatedRelation::make('feature'),
                            )
                            ->searchable()
                            ->searchDebounce(500),


                        CheckboxList::make('tags')
                            ->extraAttributes([
                                'style' => 'max-height: 330px; overflow-y: scroll'
                            ])
                            ->relationship(
                                titleAttribute: 'name',
                                modifyQueryUsing: TranslatedRelation::make('tag'),
                            )
                            ->searchable()
                            ->searchDebounce(500),

                        CheckboxList::make('colors')
                            ->extraAttributes([
                                'style' => 'max-height: 330px; overflow-y: scroll'
                            ])
                            ->name('Colorways')
                            ->relationship(
                                name: 'colors',
                                titleAttribute: 'name',
                                modifyQueryUsing: TranslatedRelation::make('color'),
                            )
                            ->searchable()
                            ->searchDebounce(500),
                    ]),

                Section::make('Attributes')
                    ->columnSpanFull()
                    ->schema([
                        KeyValue::make('attributes')
                            ->reorderable()
                            ->keyLabel('Attribute')
                            ->addActionLabel('Add attribute')
                            ->editableKeys(true),
                    ]),

                Section::make('Metadata')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('product_number')
                            ->helperText('The original product number, if known.'),

                        Select::make('year')
                            ->placeholder('Unknown')
                            ->options(
                                array_reverse(range(1990, (int)date('Y') + 3))
                            )
                            ->helperText('The year of release, if known. Can be in the future.'),

                        Select::make('currency')
                            ->placeholder('Unknown')
                            ->options(Item::CURRENCIES),


                        TextInput::make('price')
                            ->numeric()
                            ->helperText('Item price - enter 0 if the item is free.'),
                    ]),


                Section::make('Image Uploads')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        FileUpload::make('image')
                            ->name('Main Image')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                            ->disk('s3public')
                            ->visibility('public')
                            ->directory('images')
                            ->helperText('Required for publishing unless marked partial.'),

                        FileUpload::make('images')
                            ->multiple()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                            ->disk('s3public')
                            ->visibility('public')
                            ->directory('images'),
                    ]),

                RichEditor::make('notes')
                    ->columnSpanFull(),

                RichEditor::make('internal_notes')
                    ->columnSpanFull(),
            ]);
    }
}
