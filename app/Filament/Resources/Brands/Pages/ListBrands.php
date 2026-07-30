<?php

namespace App\Filament\Resources\Brands\Pages;

use App\Filament\Records\ListRecords;
use App\Filament\Resources\Brands\BrandResource;
use Filament\Actions\CreateAction;

class ListBrands extends ListRecords
{
    protected static string $resource = BrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
