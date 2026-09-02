<?php

namespace App\Providers;

use App\Composers;
use App\Helpers\TranslationHelper;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Spatie\Activitylog\Facades\Activity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton('translations.helper', fn() => new TranslationHelper(app('cache')->memo()));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::ignoreRoutes();
        Paginator::useBootstrap();

        View::composer('components.categories', Composers\Categories::class);
        View::composer('components.brands', Composers\Brands::class);
        View::composer('components.features', Composers\Features::class);
        View::composer('components.tags', Composers\Tags::class);
        View::composer('components.colors', Composers\Colors::class);
        View::composer('components.years', Composers\Years::class);

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

        // if set, we log all activity without a user to the system user.
        $default = cache()->rememberForever('user:default:system',
            fn() => User::where('username', config('app.system.default-user'))->first(),
        );

        Activity::defaultCauser($default, fn () => auth()->user());
    }
}
