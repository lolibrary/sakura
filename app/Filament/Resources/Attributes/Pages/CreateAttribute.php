<?php

namespace App\Filament\Resources\Attributes\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Attributes\AttributeResource;

class CreateAttribute extends CreateRecord
{
    protected static string $resource = AttributeResource::class;
}
