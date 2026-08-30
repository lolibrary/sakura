<?php

namespace App\Models\Traits;

use App\Contracts\Orderable;
use App\Models\Informational;
use App\Models\TranslationModel;
use Astrotomic\Translatable\Contracts\Translatable;
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

    public function sorted(): static
    {
        if ($this->count() < 2) {
            return $this;
        }

        $model = $this->first();

        if ($model instanceof Informational) {
            return $this->sortBy(function (Informational $model) {
                if (is_null($translation = $model->getTranslation())) {
                    return null;
                }

                return $translation->getAttribute($model->sortByTranslation);
            });
        }

        if ($model instanceof Orderable) {
            return $this->sortByDesc('order');
        }

        return $this->sort();
    }
}
