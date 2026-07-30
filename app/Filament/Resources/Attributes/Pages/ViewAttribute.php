<?php

namespace App\Filament\Resources\Attributes\Pages;

use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\Attributes\AttributeResource;
use Filament\Actions\EditAction;

class ViewAttribute extends ViewRecord
{


    protected static string $resource = AttributeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
