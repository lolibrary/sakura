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
use App\Models\Attribute;
use App\Models\Item;
use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
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
                    ->hintIcon(
                        icon: static fn () => setting('tooltip.english_name') ? Heroicon::OutlinedQuestionMarkCircle : null,
                        tooltip: static fn () => setting('tooltip.english_name'),
                    )
                    ->helperText(static fn () => setting('helptext.english_name'))
                ,

                TextInput::make('foreign_name')
                    ->label('Original name')
                    ->hintIcon(
                        icon: static fn () => setting('tooltip.original_name') ? Heroicon::OutlinedQuestionMarkCircle : null,
                        tooltip: static fn () => setting('tooltip.original_name'),
                    )
                    ->helperText(static fn () => setting('helptext.original_name'))
                ,

                Select::make('brand_id')
                    ->name('Brand')
                    ->required()
                    ->relationship(
                        name: 'brand',
                        titleAttribute: 'name',
                        modifyQueryUsing: TranslatedRelation::make('brand'),
                    )
                    ->hintIcon(
                        icon: static fn () => setting('tooltip.brand') ? Heroicon::OutlinedQuestionMarkCircle : null,
                        tooltip: static fn () => setting('tooltip.brand'),
                    )
                    ->helperText(static fn () => setting('helptext.brand')),

                TextInput::make('slug')
                    ->readOnly()
                    ->disabled()
                    ->copyable()
                    ->placeholder('Generated on save')
                    ->hintIcon(
                        icon: static fn () => setting('tooltip.slug') ? Heroicon::OutlinedQuestionMarkCircle : null,
                        tooltip: static fn () => setting('tooltip.slug'),
                    )
                    ->helperText(static fn () => setting('helptext.slug')),

                Section::make('Metadata')
                    ->icon(Heroicon::OutlinedDocumentMagnifyingGlass)
                    ->iconSize('sm')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('product_number')
                            ->hint('required if exists')
                            ->hintIcon(
                                icon: static fn () => setting('tooltip.product_number') ? Heroicon::OutlinedQuestionMarkCircle : null,
                                tooltip: static fn () => setting('tooltip.product_number'),
                            )
                            ->helperText(static fn () => setting('helptext.product_number'))
                            ->string()
                            ->maxLength(255),

                        YearSelect::make()
                            ->hint('required if known')
                            ->hintIcon(
                                icon: static fn () => setting('tooltip.year') ? Heroicon::OutlinedQuestionMarkCircle : null,
                                tooltip: static fn () => setting('tooltip.year'),
                            )
                            ->helperText(static fn () => setting('helptext.year')),

                        Select::make('currency')
                            ->placeholder('Unknown')
                            ->searchable()
                            ->options(Currency::options())
                            ->hintIcon(
                                icon: static fn () => setting('tooltip.currency') ? Heroicon::OutlinedQuestionMarkCircle : null,
                                tooltip: static fn () => setting('tooltip.currency'),
                            )
                            ->helperText(static fn () => setting('helptext.currency')),

                        TextInput::make('price')
                            ->numeric()
                            ->hintIcon(
                                icon: static fn () => setting('tooltip.price') ? Heroicon::OutlinedQuestionMarkCircle : null,
                                tooltip: static fn () => setting('tooltip.price'),
                            )
                            ->helperText(static fn () => setting('helptext.price')),
                    ]),

                Section::make()
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        CheckboxList::make('categories')
                            ->hintIcon(Heroicon::OutlinedQuestionMarkCircle)
                            ->hintIconTooltip('')
                            ->required()
                            ->minItems(1)
                            ->hint('at least one')
                            ->hintIcon(
                                icon: static fn () => setting('tooltip.categories') ? Heroicon::OutlinedQuestionMarkCircle : null,
                                tooltip: static fn () => setting('tooltip.categories'),
                            )
                            ->helperText(static fn () => setting('helptext.categories')),
                        CheckboxList::make('features')
                            ->hintIcon(
                                icon: static fn () => setting('tooltip.features') ? Heroicon::OutlinedQuestionMarkCircle : null,
                                tooltip: static fn () => setting('tooltip.features'),
                            )
                            ->helperText(static fn () => setting('helptext.features')),
                        CheckboxList::make('tags')
                            ->hintIcon(
                                icon: static fn () => setting('tooltip.tags') ? Heroicon::OutlinedQuestionMarkCircle : null,
                                tooltip: static fn () => setting('tooltip.tags'),
                            )
                            ->helperText(static fn () => setting('helptext.tags')),
                        CheckboxList::make('colors')
                            ->hintIcon(
                                icon: static fn () => setting('tooltip.colors') ? Heroicon::OutlinedQuestionMarkCircle : null,
                                tooltip: static fn () => setting('tooltip.colors'),
                            )
                            ->helperText(static fn () => setting('helptext.colors')),
                    ]),

                AttributeSelect::make(),

                FileUpload::make('image')
                    ->hintIcon(
                        icon: static fn () => setting('tooltip.image') ? Heroicon::OutlinedQuestionMarkCircle : null,
                        tooltip: static fn () => setting('tooltip.image') ?? null,
                    )
                    ->label('Main Image')
                    ->fetchFileInformation(false),

                MultiFileUpload::make('images')
                    ->hintIcon(
                        icon: static fn () => setting('tooltip.images') ? Heroicon::OutlinedQuestionMarkCircle : null,
                        tooltip: static fn () => setting('tooltip.images') ?? null,
                    )
                    ->fetchFileInformation(false)
                    ->columnSpanFull()
                    ->label('Additional Images'),

                RichEditor::make('notes')
                    ->hintIcon(
                        icon: static fn () => setting('tooltip.notes') ? Heroicon::OutlinedQuestionMarkCircle : null,
                        tooltip: static fn () => setting('tooltip.notes') ?? null,
                    )
                    ->toolbarButtons(RichContent::toolbar())
                    ->columnSpanFull()
                    ->helperText(setting('helptext.notes')),

                RichEditor::make('internal_notes')
                    ->columnSpanFull()
                    ->toolbarButtons(RichContent::toolbar())
                    ->helperText(setting('helptext.internal_notes')),
            ]);
    }
}
