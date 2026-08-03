<?php

namespace App\Filament\Resources\Brands\Pages;

use App\Filament\Records\EditRecord;
use App\Filament\Resources\Brands\BrandResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;

class EditBrand extends EditRecord
{
    protected static string $resource = BrandResource::class;
    protected static array $translatedFields = ['name'];

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
