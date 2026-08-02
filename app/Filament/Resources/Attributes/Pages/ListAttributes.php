<?php

namespace App\Filament\Resources\Attributes\Pages;

use App\Filament\Records\ListRecords;
use App\Filament\Resources\Attributes\AttributeResource;
use Filament\Actions\CreateAction;

class ListAttributes extends ListRecords
{
    protected static string $resource = AttributeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
