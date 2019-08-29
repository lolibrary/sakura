<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Custom 'if' template variables for various roles
        Blade::if('junior', function () {
            return auth()->check() && auth()->user()->junior();
        });
        Blade::if('lolibrarian', function () {
            return auth()->check() && auth()->user()->lolibrarian();
        });
        Blade::if('senior', function () {
            return auth()->check() && auth()->user()->senior();
        });
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->admin();
        });
        Blade::if('dev', function () {
            return auth()->check() && auth()->user()->developer();
        });
    }
}
