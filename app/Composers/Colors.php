<?php

namespace App\Composers;

use App\Models\Color;

class Colors extends Composer
{
    /**
     * {@inheritdoc}
     */
    protected function load()
    {
        return Color::select(['slug'])
            ->orderByTranslation('name')
            ->get()
            ->sortBy(function ($item, $key) {
                return strtolower($item['name']);
            })
            ->toSelectArray();
    }
}
