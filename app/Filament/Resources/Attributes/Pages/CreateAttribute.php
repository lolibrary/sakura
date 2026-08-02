<?php

namespace App\Filament\Resources\Attributes\Pages;

use App\Filament\Records\CreateRecord;
use App\Filament\Resources\Attributes\AttributeResource;

class CreateAttribute extends CreateRecord
{
    protected static string $resource = AttributeResource::class;
}
