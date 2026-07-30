<?php

namespace App\Filament\Resources\Colors\Pages;

use App\Filament\Records\ListRecords;
use App\Filament\Resources\Colors\ColorResource;
use Filament\Actions\CreateAction;

class ListColors extends ListRecords
{
    protected static string $resource = ColorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
