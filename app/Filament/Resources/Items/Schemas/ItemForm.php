<?php

namespace App\Filament\Resources\Items\Schemas;

use App\Filament\Query\TranslatedRelation;
use App\Models\Attribute;
use App\Models\Item;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('english_name')
                    ->required()
                    ->helperText('The english name of this entry.'),


                TextInput::make('foreign_name')
                    ->helperText('The original/native-language name of this entry.'),

                Select::make('brand_id')
                    ->name('Brand')
                    ->required()
                    ->relationship(
                        name: 'brand',
                        titleAttribute: 'name',
                        modifyQueryUsing: TranslatedRelation::make('brand'),
                    )
                    ->helperText('The brand of this entry, e.g. Angelic Pretty.'),

                TextInput::make('slug')
                    ->readOnly()
                    ->disabled()
                    ->copyable()
                    ->helperText('The url to this entry, items/{slug}. Cannot be changed.')
                    ->placeholder('Generated on save'),

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
                            ->helperText('The year of release, if known.'),

                        Select::make('currency')
                            ->placeholder('Unknown')
                            ->options(Item::CURRENCIES),


                        TextInput::make('price')
                            ->numeric()
                            ->helperText('Item price - enter 0 if the item is free.'),
                    ]),

                Section::make('Relationships')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([

                        CheckboxList::make('categories')
                            ->extraAttributes([
                                'style' => 'max-height: 330px; overflow-y: scroll; padding-left: 10px;'
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
                                'style' => 'max-height: 330px; overflow-y: scroll; padding-left: 10px;'
                            ])
                            ->relationship(
                                titleAttribute: 'name',
                                modifyQueryUsing: TranslatedRelation::make('feature'),
                            )
                            ->searchable()
                            ->searchDebounce(500),


                        CheckboxList::make('tags')
                            ->extraAttributes([
                                'style' => 'max-height: 330px; overflow-y: scroll; padding-left: 10px;'
                            ])
                            ->relationship(
                                titleAttribute: 'name',
                                modifyQueryUsing: TranslatedRelation::make('tag'),
                            )
                            ->searchable()
                            ->searchDebounce(500),

                        CheckboxList::make('colors')
                            ->extraAttributes([
                                'style' => 'max-height: 330px; overflow-y: scroll; padding-left: 10px;'
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

                Repeater::make('Attributes')
                    ->label('Attributes')
                    ->columnSpanFull()
                    ->columns(2)
                    ->relationship('values')
                    ->schema([
                        Select::make('attribute_id')
                            ->relationship(
                                name: 'attribute',
                                titleAttribute: 'name',
                                modifyQueryUsing: TranslatedRelation::make('attribute'),
                            )
                            ->options(fn() => Attribute::cached()
                                ->mapWithKeys(fn(Attribute $attr) => [$attr->id => $attr->name])
                                ->sort()
                            )
                            ->searchable()
                            ->searchDebounce(500)
                            ->required()
                            ->preload()
                            ->live()
                            ->disableOptionsWhenSelectedInSiblingRepeaterItems(),
                        TextInput::make('value')
                            ->required(),
                    ])
                    ->addActionLabel('Add Attribute')
                    ->reorderableWithButtons(),


                FileUpload::make('image')
                    ->label('Main Image')
                    ->disk('s3public')
                    ->visibility('public')
                    ->directory('images')
                    ->previewable()
                    ->openable()
                    ->maxSize(1024 * 5)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                    ->helperText("Acceptable upload types: JPEG, PNG, GIF, WEBP. 5MB limit."),

                FileUpload::make('images')
                    ->columnSpanFull()
                    ->label('Additional Images')
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->openable()
                    ->previewable()
                    ->maxSize(1024 * 5)
                    ->maxFiles(40)
                    ->panelLayout('grid')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                    ->disk('s3public')
                    ->visibility('public')
                    ->directory('images'),

                RichEditor::make('notes')
                    ->columnSpanFull(),

                RichEditor::make('internal_notes')
                    ->columnSpanFull()
                    ->helperText("Please provide sources, and credit images that aren't yours!"),
            ]);
    }
}
