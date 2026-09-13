<?php

namespace App\Extensions\Sessions;

use Illuminate\Cache\RedisTagSet;
use Illuminate\Contracts\Cache\Store;

class ScopedTagSet extends RedisTagSet
{
    protected(set) string $scope;

    /**
     * Create a new ScopedTagSet instance.
     *
     * This is just a regular tagset, but the namespace is derived from the scope alone.
     * Tags in this instance are *additional* and a way to search.
     *
     * @param string[] $names
     */
    public function __construct(Store $store, string $scope, array $names = [])
    {
        parent::__construct($store, $names);

        $this->scope = $scope;
    }

    /**
     * Get a unique ID for this scope.
     *
     * @return string
     */
    public function getScopeId(): string
    {
        return $this->tagId($this->scope);
    }

    /**
     * Get a unique namespace that changes when the scope is flushed.
     *
     * @return string
     */
    public function getNamespace(): string
    {
        return $this->scope;
    }

    /**
     * Get an array of tag identifiers for all of the tags in the set.
     *
     * @return array
     */
    protected function tagIds(): array
    {
        return array_map($this->tagId(...), [$this->scope] + $this->names);
    }
}
