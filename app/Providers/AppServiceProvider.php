<?php

namespace App\Providers;

use Alcohol\ISO4217;
use App\Composers;
use App\Helpers\Currency;
use App\Helpers\TranslationHelper;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\ResourceRegistrar;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Event;
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
    public function register(): void
    {
        app()->singleton('translations.helper', static fn() => new TranslationHelper(app('cache')->memo()));
        app()->singleton('iso4217', static fn() => new ISO4217);
        app()->alias('iso4217', ISO4217::class);
        app()->singleton('currency', static fn() => new Currency(app('iso4217')));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->bootRoutes();
        $this->bootViews();
        $this->bootBlade();
        $this->bootEvents();
        $this->bootActivity();
    }

    protected function bootBlade(): void
    {
        // Custom 'if' template variables for various roles
        Blade::if('junior', static fn() => auth()->user()?->junior());
        Blade::if('lolibrarian', static fn() => auth()->user()?->lolibrarian());
        Blade::if('senior', static fn() => auth()->user()?->senior());
        Blade::if('trusted', static fn() => auth()->user()?->trusted());
        Blade::if('admin', static fn() => auth()->user()?->admin());
        Blade::if('dev', static fn() => auth()->user()?->developer());
    }

    protected function bootRoutes(): void
    {
        ResourceRegistrar::singularParameters();
    }

    protected function bootEvents(): void
    {
        Event::listen(Registered::class, SendEmailVerificationNotification::class);
    }

    protected function bootActivity(): void
    {
        // if set, we log all activity without a user to the system user.
        $default = cache()->rememberForever('user:default:system',
            static fn() => User::where('username', config('app.system.default-user'))->first(),
        );

        Activity::defaultCauser($default, static fn () => auth()->user());
    }

    protected function bootViews(): void
    {
        Paginator::useBootstrap();

        View::composer('components.categories', Composers\Categories::class);
        View::composer('components.brands', Composers\Brands::class);
        View::composer('components.features', Composers\Features::class);
        View::composer('components.tags', Composers\Tags::class);
        View::composer('components.colors', Composers\Colors::class);
        View::composer('components.years', Composers\Years::class);
    }
}
