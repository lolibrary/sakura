<?php

namespace App\Filament\Components;

use App\Filament\Query\TranslatedRelation;
use App\Models\Attribute;
use App\Models\Filters\VisibilityFilter;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class AttributeSelect
{
    public static function make(): Repeater
    {
        return Repeater::make('attributes')
            ->label('Attributes')
            ->columnSpanFull()
            ->columns(2)
            ->relationship('values')
            ->defaultItems(0)
            ->schema([
                Select::make('attribute_id')
                    ->relationship(
                        name: 'attribute',
                        titleAttribute: 'name',
                        modifyQueryUsing: TranslatedRelation::make('attribute'),
                    )
                    ->options(
                        fn () => Attribute::cached()
                            ->mapWithKeys(fn (Attribute $attr) => [$attr->id => $attr->name])
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
            ->reorderableWithButtons()
            ->helperText('Attributes are not required, but are recommended!');
    }
}
