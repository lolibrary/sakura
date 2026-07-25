<?php

namespace App\Providers;

use App\Composers;
use App\Services\Fastly\ServiceProxy;
use Fastly\Configuration;
use Illuminate\Foundation\Application;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;

class FastlyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
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
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
