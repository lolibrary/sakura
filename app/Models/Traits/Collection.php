<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Collection as BaseCollection;

class Collection extends BaseCollection
{
    /**
     * Convert this collection into an array for multi-select boxes.
     *
     * @return array<string, string>
     */
    public function toSelectArray(string $key = 'slug', string $value = 'name'): array
    {
        return $this->mapWithKeys(function ($item) use ($key, $value) {
            return [$item->{$key} => $item->{$value}];
        })->all();
    }
}
