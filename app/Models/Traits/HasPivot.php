<?php

namespace App\Models\Traits;

use App\Models\Pivot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

trait HasPivot
{
    /**
     * Create a new pivot model.
     *
     * @param  array<string, mixed>  $attributes
     * @param  string  $table
     * @param  bool  $exists
     * @param  null|class-string  $using
     */
    public function newPivot(Model $parent, array $attributes, $table, $exists, $using = null): Relations\Pivot
    {
        return $using
            ? $using::fromRawAttributes($parent, $attributes, $table, $exists)
            : Pivot::fromAttributes($parent, $attributes, $table, $exists);
    }
}
