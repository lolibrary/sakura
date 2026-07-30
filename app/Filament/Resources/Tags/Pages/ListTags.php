<?php

namespace App\Filament\Resources\Tags\Pages;

use App\Filament\Records\ListRecords;
use App\Filament\Resources\Tags\TagResource;
use Filament\Actions\CreateAction;

class ListTags extends ListRecords
{
    protected static string $resource = TagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
