<?php

namespace App\Filament\Resources\Colors\Pages;

use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\Colors\ColorResource;
use Filament\Actions\EditAction;

class ViewColor extends ViewRecord
{
    protected static string $resource = ColorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
