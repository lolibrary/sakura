<?php

namespace App\Models;

use App\Models\Traits\DateHandling;
use Illuminate\Database\Eloquent\Relations\Pivot as BasePivot;
use Spatie\Activitylog\Models\Concerns\LogsActivity;

/**
 * A custom pivot model for this application.
 *
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Pivot extends BasePivot
{
    use DateHandling, LogsActivity;
}
