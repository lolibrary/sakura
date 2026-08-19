<?php

namespace App\Models;

/**
 * A feature of an Item (e.g. Back Shirring).
 *
 * @property string $name The name of this Feature.
 * @property string $slug The URL slug of this Feature.
 * @property \App\Models\Item[]|\Illuminate\Database\Eloquent\Collection $items
 */
class Feature extends Informational
{
    //
}
