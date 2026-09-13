<?php

namespace App\Extensions\Sessions;

use Illuminate\Cache\Events\CacheFlushed;
use Illuminate\Cache\Events\CacheFlushing;
use Illuminate\Cache\RedisStore;
use Illuminate\Cache\TaggedCache;
use Illuminate\Cache\TagSet;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Redis\Connections\PhpRedisClusterConnection;
use Illuminate\Redis\Connections\PhpRedisConnection;
use Illuminate\Redis\Connections\PredisClusterConnection;
use Illuminate\Redis\Connections\PredisConnection;
use function Illuminate\Support\enum_value;

/**
 * A scoped cache can have a scope, as well as many tags for searching.
 *
 * This allows things such as:
 *
 *   Cache::scope('session')->tags(['user:$userId', 'ip:$ip'])->put($sessionId, $session)
 *
 * When using scopes, we can obtain a hash of all keys under it, as well as tagged hashes per tag.
 *
 *   Cache::scope('session')->keys("user:$userId") -> [
 *     "session:ZfmObkEipW:D2N08gEQuKlyr6crSQ",
 *     "session:ZfmObkEipW:EztXPrD2N08gEQuKrS",
 *     "session:PrD2N08gEd:EztXPrEQuKlyr6crKr",
 *   ]
 *
 *   Cache::scope('session')->keys() -> [ 430 keys... ]
 */
class RedisScopedStore extends RedisStore
{
    /**
     * Scope this cache instance to a specific key.
     */
    public function scope(string $scope): TaggedCache
    {
        return new RedisScopedCache($this, new ScopedTagSet($this, $scope));
    }
}
