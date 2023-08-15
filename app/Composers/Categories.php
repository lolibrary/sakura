<?php

namespace App\Composers;

use App\Models\Category;

class Categories extends Composer
{
    /**
     * {@inheritdoc}
     */
    protected function load()
    {
        return Category::select(['slug'])
            ->orderByTranslation('name')
            ->get()
            ->sortBy(function ($item, $key) {
                return strtolower($item['name']);
            })
            ->toSelectArray();
    }
}
