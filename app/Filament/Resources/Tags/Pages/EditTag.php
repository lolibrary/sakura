<?php

namespace App\Filament\Resources\Tags\Pages;

use App\Filament\Records\EditRecord;
use App\Filament\Resources\Tags\TagResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;

class EditTag extends EditRecord
{
    protected static string $resource = TagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
