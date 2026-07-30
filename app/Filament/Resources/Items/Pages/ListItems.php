<?php

namespace App\Filament\Resources\Items\Pages;

use App\Filament\Records\ListRecords;
use App\Filament\Resources\Items\ItemResource;
use Filament\Actions\CreateAction;

class ListItems extends ListRecords
{
    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
