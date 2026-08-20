<?php

namespace App\Models\Traits;

use App\Contracts\Orderable;
use Illuminate\Database\Eloquent\Collection;

trait Cacheable
{
    /**
     * Get all cached instances of this model.
     *
     * @return Collection<static>
     */
    public static function cached(): Collection
    {
        return cache()->tags(['model'])->rememberForever(static::cacheKey(), function (): Collection {
            /** @var \Illuminate\Database\Eloquent\Builder $query */
            $query = static::with('translations');

            if (new static instanceof Orderable) {
                $query = $query->orderByDesc('order')->orderBy('created_at');
            }

            return $query->get();
        });
    }

    /**
     * Get a cache key for this.
     *
     * @return string
     */
    public static function cacheKey(): string
    {
        return str(static::class)->classBasename()->lower()->plural()->toString();
    }

    /**
     * Bust this model's cache.
     *
     * @return void
     */
    public static function bust(): void
    {
        cache()->tags(['model'])->forget(static::cacheKey());
    }

    /**
     * Boot a cacheable model.
     *
     * @return void
     */
    protected static function bootCacheable(): void
    {
        static::saved(function () {
            static::bust();
            cache()->tags('filters')->flush();
        });

        static::deleted(function () {
            static::bust();
            cache()->tags('filters')->flush();
        });
    }
}
