<?php

namespace App\Filament\Resources\Attributes\Pages;

use App\Filament\Records\EditRecord;
use App\Filament\Resources\Attributes\AttributeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;

class EditAttribute extends EditRecord
{
    protected static string $resource = AttributeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
