<?php

namespace App\Filament\Components;

use App\Filament\Query\TranslatedRelation;
use Filament\Forms\Components\CheckboxList as CheckboxListComponent;

class CheckboxList
{
    public static function make(string $relation): CheckboxListComponent
    {
        $style = collect([
            'max-height: 330px',
            'overflow-y: auto',
            'padding-left: 14px',
            'overflow-x: hidden',
        ])->join('; ');

        return CheckboxListComponent::make($relation)
            ->extraAttributes(['style' => $style])
            ->gridDirection('row')
            ->relationship(
                titleAttribute: 'name',
                modifyQueryUsing: TranslatedRelation::make(str($relation)->singular()),
            )
            ->searchable()
            ->searchDebounce(500);
    }
}
