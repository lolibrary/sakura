<?php

namespace App\Models\Traits;
use Illuminate\Support\Facades\App;

trait Cacheable
{
    /**
     * Get all cached instances of this model.
     *
     * @return mixed
     * @throws \Exception
     */
    public static function cached()
    {
        return cache()->rememberForever(static::cacheKey(), function () {
            return static::with('translations')->get();
        });
    }

    /**
     * Get a cache key for this.
     *
     * @return string
     */
    public static function cacheKey()
    {
        $locale = App::getLocale();
        $key = mb_strtolower(class_basename(static::class));

        return 'models:'.$key;
    }

    /**
     * Bust this model's cache.
     *
     * @return void
     * @throws \Exception
     */
    public static function bust()
    {
        cache()->forget(static::cacheKey());
    }

    /**
     * Boot a cacheable model.
     *
     * @return void
     */
    protected static function bootCacheable()
    {
        static::saved(function () {
            static::bust();
            static::bust();
            cache()->tags('filters')->flush();
        });

        static::deleted(function () {
            static::bust();
            cache()->tags('filters')->flush();
        });
    }
}
