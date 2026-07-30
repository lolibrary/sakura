<?php

namespace App\Filament\Resources\Categories\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Categories\CategoryResource;
use Filament\Actions\CreateAction;

class ListCategories extends ListRecords
{


    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
