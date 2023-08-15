<?php

namespace App\Composers;

use App\Models\Brand;

class Brands extends Composer
{
    /**
     * {@inheritdoc}
     */
    protected function load()
    {
        return Brand::select(['slug'])
            ->orderByTranslation('name')
            ->get()
            ->sortBy(function ($item, $key) {
                return strtolower($item['name']);
            })
            ->toSelectArray();
    }
}
