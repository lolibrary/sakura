<?php

namespace App\Filament\Resources\Features\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Features\FeatureResource;
use Filament\Actions\CreateAction;

class ListFeatures extends ListRecords
{
    protected static string $resource = FeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
