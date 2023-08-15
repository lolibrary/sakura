<?php

namespace App\Composers;

use App\Models\Tag;

class Tags extends Composer
{
    /**
     * {@inheritdoc}
     */
    protected function load()
    {
        return Tag::select(['slug'])
            ->orderByTranslation('name')
            ->get()
            ->sortBy(function ($item, $key) {
                return strtolower($item['name']);
            })
            ->toSelectArray();
    }
}
