<?php

namespace App\Models\Traits;
use Illuminate\Support\Facades\App;
use BadMethodCallException;

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
            static::flushFilterCache();
        });

        static::deleted(function () {
            static::bust();
            static::flushFilterCache();
        });
    }

    /**
     * Flush filter cache when the active store supports tags.
     *
     * @return void
     */
    protected static function flushFilterCache()
    {
        try {
            cache()->tags('filters')->flush();
        } catch (BadMethodCallException $exception) {
            // Local file and array stores do not support tags.
        }
    }
}
