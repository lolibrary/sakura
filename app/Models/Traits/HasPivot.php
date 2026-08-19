<?php

namespace App\Models\Traits;

use App\Models\Pivot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;

trait HasPivot
{
    /**
     * Create a new pivot model.
     *
     * @param  string  $table
     * @param  bool  $exists
     * @param  mixed  $using
     * @return Pivot|mixed
     */
    public function newPivot(Eloquent $parent, array $attributes, $table, $exists, $using = null)
    {
        return $using
            ? $using::fromRawAttributes($parent, $attributes, $table, $exists)
            : Pivot::fromAttributes($parent, $attributes, $table, $exists);
    }
}
