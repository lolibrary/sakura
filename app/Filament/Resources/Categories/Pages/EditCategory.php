<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Records\EditRecord;
use App\Filament\Resources\Categories\CategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;

class EditCategory extends EditRecord
{


    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
