<?php

namespace App\Extensions\Sessions;

use Illuminate\Cache\TaggedCache;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Cache\Repository as CacheContract;
use Illuminate\Contracts\Container\Container;
use Illuminate\Session\CacheBasedSessionHandler;
use Illuminate\Support\InteractsWithTime;
use SessionHandlerInterface;

class TaggedSessionHandler extends CacheBasedSessionHandler
{
    use InteractsWithTime;

    protected ?Container $container;

    public function __construct(CacheContract $cache, $minutes, ?Container $container = null)
    {
        parent::__construct($cache, $minutes);

        $this->container = $container;
    }

    /**
     * @param string $sessionId
     * @return string
     */
    public function read($sessionId): string
    {
        $session = $this->cache->get($sessionId, []);

        if (isset($session['payload'])) {
            return base64_decode($session['payload']);
        }

        return '';
    }

    public function write($sessionId, $data): bool
    {
        $payload = $this->getDefaultPayload($data);

        $cache = $this->getScopedCache($payload);

        return $cache->put($sessionId, $payload, $this->minutes * 60);
    }

    public function destroy($sessionId): bool
    {
        $existing = $this->cache->get($sessionId);

        if (is_array($existing)) {
            return $this->getScopedCache($existing)->forget($sessionId);
        }

        return $this->cache->forget($sessionId);
    }

    protected function getScopedCache(array $payload): RedisScopedCache
    {
        if (! $this->cache instanceof RedisScopedCache) {
            throw new \BadMethodCallException('getScopedCache extects the cache store to be properly scoped');
        }

        if (array_key_exists('user_id', $payload)) {
            /** @var RedisScopedCache */
            return $this->cache->tags(["user:{$payload['user_id']}"]);
        }

        return $this->cache;
    }

    /**
     * Get the default payload for the session.
     *
     * @param  string  $data
     * @return array
     */
    protected function getDefaultPayload(string $data): array
    {
        $payload = [
            'payload' => base64_encode($data),
            'last_activity' => $this->currentTime(),
        ];

        if (! $this->container) {
            return $payload;
        }

        return tap($payload, function (array &$payload) {
            $this->addUserInformation($payload)
                ->addRequestInformation($payload);
        });
    }

    /**
     * Add the user information to the session payload.
     *
     * @param  array  $payload
     * @return $this
     */
    protected function addUserInformation(array &$payload): static
    {
        if ($this->container->bound(Guard::class)) {
            $payload['user_id'] = $this->userId();
        }

        return $this;
    }

    /**
     * Get the currently authenticated user's ID.
     */
    protected function userId(): string | int | null
    {
        return $this->container->make(Guard::class)->id();
    }

    /**
     * Add the request information to the session payload.
     *
     * @param  array  $payload
     * @return $this
     */
    protected function addRequestInformation(array &$payload): static
    {
        if ($this->container->bound('request')) {
            $payload = array_merge($payload, [
                'ip_address' => $this->ipAddress(),
                'user_agent' => $this->userAgent(),
            ]);
        }

        return $this;
    }

    /**
     * Get the IP address for the current request.
     *
     * @return string|null
     */
    protected function ipAddress(): ?string
    {
        return $this->container->make('request')->ip();
    }

    /**
     * Get the user agent for the current request.
     *
     * @return string|null
     */
    protected function userAgent(): ?string
    {
        return mb_substr(mb_convert_encoding((string) $this->container->make('request')->header('User-Agent'), 'UTF-8'), 0, 500);
    }
}
