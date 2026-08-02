<?php

namespace App\Filament\Records;

use Doriiaan\FilamentAstrotomic\Resources\Pages\EditTranslatable;
use Filament\Resources\Pages\EditRecord as BaseEditRecord;

class EditRecord extends BaseEditRecord
{
    use EditTranslatable;
}
