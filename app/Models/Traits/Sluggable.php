<?php

namespace App\Models\Traits;

use App\Models\Item;
use Illuminate\Support\Str;
use RuntimeException;

trait Sluggable
{
    /**
     * Boot this trait and register model listeners.
     */
    protected static function bootSluggable(): void
    {
        static::creating(function (Item $model) {
            if ($model->slug !== null) {
                return;
            }

            // Let the exception cause this part to fail here.
            $model->slug = static::createSlug($model);
        });
    }

    /**
     * Get a slug for an item.
     */
    public static function createSlug(Item $item): string
    {
        $candidate = $item->brand->short_name.'-'.Str::slug($item->english_name);

        if (! static::where('slug', $candidate)->exists()) {
            return $candidate;
        }

        $attempts = -1;

        do {
            if ($attempts > 30) {
                throw new RuntimeException("Too many items have the slug prefix [{$candidate}]");
            }

            $try = $candidate.'-'.++$attempts;
        } while (static::where('slug', $try)->exists());

        return $try;
    }
}
