<?php

namespace App\Filament\Resources\Items\Schemas;

use App\Filament\Components\AttributeSelect;
use App\Filament\Components\CheckboxList;
use App\Filament\Components\FileUpload;
use App\Filament\Components\MultiFileUpload;
use App\Filament\Components\YearSelect;
use App\Filament\Query\TranslatedRelation;
use App\Helpers\RichContent;
use App\Models\Item;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

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
                            ->helperText('The original product number, if known.')
                            ->string()
                            ->maxLength(255),

                        YearSelect::make(),

                        Select::make('currency')
                            ->placeholder('Unknown')
                            ->options(Item::CURRENCIES)
                            ->helperText('Unknown here hides the entire price.'),

                        TextInput::make('price')
                            ->numeric()
                            ->helperText('Item price - enter 0 if the item is free.'),
                    ]),

                Section::make()
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        CheckboxList::make('categories')->required()->minItems(1),
                        CheckboxList::make('features'),
                        CheckboxList::make('tags'),
                        CheckboxList::make('colors'),
                    ]),

                AttributeSelect::make(),

                FileUpload::make('image')->label('Main Image'),

                MultiFileUpload::make('images')
                    ->fetchFileInformation(false)
                    ->columnSpanFull()
                    ->label('Additional Images'),

                RichEditor::make('notes')
                    ->toolbarButtons(RichContent::toolbar())
                    ->columnSpanFull(),

                RichEditor::make('internal_notes')
                    ->columnSpanFull()
                    ->toolbarButtons(RichContent::toolbar())
                    ->helperText(new HtmlString(
                        "Please provide sources, and credit images that aren't yours!<br><br>".
                        'Use <strong>@mentions</strong> and a date for signing off comments.'
                    )),
            ]);
    }
}
