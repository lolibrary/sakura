<?php

namespace App\Filament\Resources\Features\Pages;

use App\Filament\Records\EditRecord;
use App\Filament\Resources\Features\FeatureResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;

class EditFeature extends EditRecord
{
    protected static string $resource = FeatureResource::class;
    protected static array $translatedFields = ['name'];

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
