<?php

namespace App\Services\Fastly;

use Fastly\Api\PurgeApi;
use Fastly\Configuration;

class ServiceProxy
{
    protected static array $proxies = [
        'purge' => PurgeApi::class,
    ];

    public function __construct(private Configuration $config) {}

    public function __call(string $name, array $arguments)
    {
        if (! array_key_exists($name, static::$proxies)) {
            throw new \InvalidArgumentException("method $name does not exist on this class");
        }

        return new (static::$proxies[$name])(null, $this->config);
    }
}
