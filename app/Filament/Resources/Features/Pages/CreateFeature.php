<?php

namespace App\Filament\Resources\Features\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Features\FeatureResource;

class CreateFeature extends CreateRecord
{
    protected static string $resource = FeatureResource::class;
}
