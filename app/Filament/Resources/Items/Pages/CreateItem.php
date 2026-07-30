<?php

namespace App\Filament\Resources\Items\Pages;

use App\Filament\Records\CreateRecord;
use App\Filament\Resources\Items\ItemResource;

class CreateItem extends CreateRecord
{
    protected static string $resource = ItemResource::class;
}
