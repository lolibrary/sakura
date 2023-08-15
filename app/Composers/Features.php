<?php

namespace App\Composers;

use App\Models\Feature;

class Features extends Composer
{
    /**
     * {@inheritdoc}
     */
    protected function load()
    {
        return Feature::select(['slug'])
            ->orderByTranslation('name')
            ->get()
            ->sortBy(function ($item, $key) {
                return strtolower($item['name']);
            })
            ->toSelectArray();
    }
}
