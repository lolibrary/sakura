<?php

namespace App\Filament\Resources\Categories\Pages;

use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\Categories\CategoryResource;
use Filament\Actions\EditAction;

class ViewCategory extends ViewRecord
{


    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
