<?php

namespace App\Providers;

use App\Services\Fastly\ServiceProxy;
use Fastly\Configuration;
use Illuminate\Support\ServiceProvider;

class FastlyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('fastly', function () {
            $config = Configuration::getDefaultConfiguration();

            if ($key = config('services.fastly.api-key')) {
                $config = $config->setApiToken($key);
            }

            return new ServiceProxy($config);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
