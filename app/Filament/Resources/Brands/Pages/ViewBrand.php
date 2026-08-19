<?php

namespace App\Filament\Resources\Brands\Pages;

use App\Filament\Records\ViewRecord;
use App\Filament\Resources\Brands\BrandResource;
use Filament\Actions\EditAction;

class ViewBrand extends ViewRecord
{
    protected static string $resource = BrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
