<?php

namespace App\Filament\Resources\Features\Pages;

use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\Features\FeatureResource;
use Filament\Actions\EditAction;

class ViewFeature extends ViewRecord
{
    protected static string $resource = FeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
