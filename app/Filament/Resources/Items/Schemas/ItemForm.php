<?php

namespace App\Filament\Resources\Items\Schemas;

use App\Filament\Components\AttributeSelect;
use App\Filament\Components\CheckboxList;
use App\Filament\Components\FileUpload;
use App\Filament\Components\MultiFileUpload;
use App\Filament\Components\YearSelect;
use App\Filament\Query\TranslatedRelation;
use App\Helpers\Currency;
use App\Helpers\RichContent;
use App\Models\Item;
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\HtmlString;

class ItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('english_name')
                    ->required()
                    ->helperText('The english name of this entry.')
                    ->hintIcon(Heroicon::OutlinedQuestionMarkCircle)
                    ->hintIconTooltip('If the original entry\'s name is not in english, this must be a translation. This may be revised when reviewing your entry.')
                ,

                TextInput::make('foreign_name')
                    ->label('Original name')
                    ->helperText('The original/native-language name of this entry, if not english.')
                    ->hintIcon(Heroicon::OutlinedQuestionMarkCircle)
                    ->hintIconTooltip('This should be the original name as it appears on a brand listing, e.g. Midnight Dollワンピース. Also known as "Foreign name".')
                ,

                Select::make('brand_id')
                    ->name('Brand')
                    ->required()
                    ->relationship(
                        name: 'brand',
                        titleAttribute: 'name',
                        modifyQueryUsing: TranslatedRelation::make('brand'),
                    )
                    ->helperText('The brand of this entry, e.g. Angelic Pretty.')
                    ->hintIcon(Heroicon::OutlinedQuestionMarkCircle)
                    ->hintIconTooltip('If this is an Indie Brand, use the most appropriate brand (Western/Chinese/Korean Indie, etc) and add their tag below.'),

                TextInput::make('slug')
                    ->readOnly()
                    ->disabled()
                    ->copyable()
                    ->helperText('The url to this entry, items/{slug}. Editable by admins.')
                    ->placeholder('Generated on save'),

                Section::make('Metadata')
                    ->icon(Heroicon::OutlinedDocumentMagnifyingGlass)
                    ->iconSize('sm')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('product_number')
                            ->hint('required if exists')
                            ->hintIcon(Heroicon::OutlinedQuestionMarkCircle)
                            ->hintIconTooltip('If you are unsure of how to find a product number on certain brands, ask in #junior-help on Discord')
                            ->helperText('The original product number or code, if known.')
                            ->string()
                            ->maxLength(255),

                        YearSelect::make()
                            ->hint('required if known')
                            ->hintIcon(Heroicon::OutlinedQuestionMarkCircle)
                            ->hintIconTooltip('If there is an expected ship date provided for a preorder that will have a significant wait time, you can put it in the Notes field.'),

                        Select::make('currency')
                            ->placeholder('Unknown')
                            ->searchable()
                            ->options(Currency::options())
                            ->hintIcon(Heroicon::OutlinedQuestionMarkCircle)
                            ->hintIconTooltip("It's very rare to not have a price on a newer release, but for historical data not including one is okay.")
                            ->helperText('Unknown here hides the entire price from the entry page.'),

                        TextInput::make('price')
                            ->numeric()
                            ->hintIcon(Heroicon::OutlinedQuestionMarkCircle)
                            ->hintIconTooltip('If an item is genuinely free, enter a price of 0 with an appropriate currency.')
                            ->helperText('Item price; only shown if currency is present.'),
                    ]),

                Section::make()
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        CheckboxList::make('categories')
                            ->hintIcon(Heroicon::OutlinedQuestionMarkCircle)
                            ->hintIconTooltip('If you are unsure of what item categories should contain which items, please take a look at the wiki. We categorize strapless dresses and dresses with straps as JSKs, and any other dress cuts as OPs for ease of searchability.')
                            ->required()
                            ->minItems(1)
                            ->hint('at least one'),
                        CheckboxList::make('features')
                            ->hintIcon(Heroicon::OutlinedQuestionMarkCircle)
                            ->hintIconTooltip('Features are exclusively about physical characteristics of the item. Please do not guess!'),
                        CheckboxList::make('tags')
                            ->hintIcon(Heroicon::OutlinedQuestionMarkCircle)
                            ->hintIconTooltip('Tags are any other information about the item or entry.'),
                        CheckboxList::make('colors')
                            ->hintIcon(Heroicon::OutlinedQuestionMarkCircle)
                            ->hintIconTooltip('Pick the option that best matches the item and the official colorways.'),
                    ]),

                AttributeSelect::make(),

                FileUpload::make('image')->label('Main Image'),

                MultiFileUpload::make('images')
                    ->fetchFileInformation(false)
                    ->columnSpanFull()
                    ->label('Additional Images'),

                RichEditor::make('notes')
                    ->hintIcon(Heroicon::OutlinedQuestionMarkCircle)
                    ->hintIconTooltip('These are generally the actual brand listing comments from a brand\'s own website.')
                    ->toolbarButtons(RichContent::toolbar())
                    ->columnSpanFull()
                    ->helperText('This is the notes that appear alongside an item on the site.'),

                RichEditor::make('internal_notes')
                    ->columnSpanFull()
                    ->toolbarButtons(RichContent::toolbar())
                    ->helperText('Please provide sources, and image credits here, as well as any other information that may be helpful.'),
            ]);
    }
}
