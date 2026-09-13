<?php

namespace App\Extensions\Sessions;

use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Cache\TaggedCache;

class RedisScopedCache extends RedisTaggedCache
{
    /**
     * Scope this cache to a specific list of tags.
     */
    public function tags($names): TaggedCache
    {
        if ($this->tags instanceof ScopedTagSet) {
            return new static(
                store: $this->store,
                tags: new ScopedTagSet(
                    store: $this->store,
                    scope: $this->tags->scope,
                    names: func_num_args() === 1 ? (array) $names : func_get_args(),
                ),
            );
        }

        return parent::tags($names);
    }

    public function keys(): array
    {
        /** @var ScopedTagSet $tags */
        $tags = $this->getTags();

        return $tags->entries()->all();
    }

    /**
     * Get a fully-qualified key for a tagged item.
     *
     * @param  string  $key
     * @return string
     */
    public function taggedItemKey($key): string
    {
        return $this->tags->getNamespace().':'.$key;
    }
}
