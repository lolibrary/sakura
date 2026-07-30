<?php

namespace App\Filament\Resources\Colors\Pages;

use Filament\Resources\Pages\ListRecords;
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
