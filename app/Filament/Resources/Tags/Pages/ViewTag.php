<?php

namespace App\Filament\Resources\Tags\Pages;

use App\Filament\Records\ViewRecord;
use App\Filament\Resources\Tags\TagResource;
use Filament\Actions\EditAction;

class ViewTag extends ViewRecord
{
    protected static string $resource = TagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
