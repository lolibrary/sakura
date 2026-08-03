<?php

namespace App\Filament\Resources\Colors\Pages;

use App\Filament\Records\EditRecord;
use App\Filament\Resources\Colors\ColorResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;

class EditColor extends EditRecord
{
    protected static string $resource = ColorResource::class;
    protected static array $translatedFields = ['name'];

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
