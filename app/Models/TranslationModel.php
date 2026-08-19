<?php

namespace App\Models;

use App\Models\Traits\DateHandling;
use App\Models\Traits\HasPivot;
use Illuminate\Database\Eloquent\Attributes\DateFormat;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * @property string $name The name of this model.
 */
#[DateFormat('Y-m-d H:i:sO')]
#[Fillable('name')]
abstract class TranslationModel extends Eloquent
{
    use DateHandling, HasPivot;
}
