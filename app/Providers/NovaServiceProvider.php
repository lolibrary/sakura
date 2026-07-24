<?php

namespace App\Providers;

use App\Nova\Dashboards\Main;
use App\Nova\Metrics\ItemsPublished;
use App\Nova\Metrics\YourSubmissions;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // report to sentry.
        Nova::report(function ($exception) {
            if (app()->bound('sentry')) {
                app('sentry')->captureException($exception);
            }
        });

        Nova::serving(function ($event) {
            app()->setLocale('en_US');
        });

        Nova::style("css-overrides", public_path("assets/overrides.css"));

        parent::boot(); // must come last to prevent migrations.
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        // Currently allow anyone junior or higher to use nova.
        Gate::define('viewNova', function ($user) {
            return $user->junior();
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            ItemsPublished::make()
                ->width('1/4')
                ->help('Items published on Lolibrary to date.'),
            YourSubmissions::make()
                ->width('1/4')
                ->help('All items you have created which are in the "draft", "pending" or "changes requested" states.'),
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }
}
