<?php

namespace App\Helpers;

use App\Models\SiteSetting;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Database\Eloquent\Collection;

class Settings
{
    protected array $settings = [];
    protected bool $initialized = false;

    public function __construct(protected Repository $cache) {}

    public function initialize(): void
    {
        $models = $this->cache->sear(key: 'settings:models', callback: static fn() => SiteSetting::all());

        $this->settings = $this->cache->sear('settings:array', fn() => $this->build($models));
        $this->initialized = true;
    }

    public function get(string $setting, mixed $default = null): mixed
    {
        // lazy-load the settings so we don't use them unless needed by the request
        if (! $this->initialized) {
            $this->initialize();
        }

        return $this->settings[$setting] ?? $default;
    }

    public function forget(): void
    {
        $this->cache->forget('settings:models');
        $this->cache->forget('settings:array');
    }

    protected function build(Collection $models): array
    {
        return $models->mapWithKeys(static fn (SiteSetting $model) => [
            $model->setting->value => $model->value,
        ])->all();
    }
}
