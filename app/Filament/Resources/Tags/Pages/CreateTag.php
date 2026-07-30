<?php

namespace App\Filament\Resources\Tags\Pages;

use App\Filament\Records\CreateRecord;
use App\Filament\Resources\Tags\TagResource;

class CreateTag extends CreateRecord
{
    protected static string $resource = TagResource::class;
}
