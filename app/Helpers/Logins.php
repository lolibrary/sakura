<?php

namespace App\Helpers;

use App\Extensions\Sessions\RedisScopedStore;
use App\Extensions\Sessions\Session;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Cache\Repository;

class Logins
{
    /**
     * @param Repository<RedisScopedStore> $cache
     * @param Guard $guard
     */
    public function __construct(protected Repository $cache, protected Guard $guard) {}

    public function sessions(): iterable
    {
        if (is_null($id = $this->guard->id())) {
            return [];
        }

        $entries = $this->cache->scope('session')->tags(["user:$id"])->keys();

        return collect($this->cache->getMultiple($entries))
            ->filter()
            ->map(fn (array $session, string $sessionId) => new Session($sessionId, $session))
            ->all();
    }
}
