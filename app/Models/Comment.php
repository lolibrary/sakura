<?php

namespace App\Models;

use Relaticle\Comments\Models\Comment as Base;
use Spatie\Activitylog\Models\Concerns\HasActivity;

class Comment extends Base
{
    use HasActivity;
}
