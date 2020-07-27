<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Models\Attribute::class => \App\Policies\AttributePolicy::class,
        \App\Models\Brand::class => \App\Policies\BrandPolicy::class,
        \App\Models\Category::class => \App\Policies\CategoryPolicy::class,
        \App\Models\Color::class => \App\Policies\ColorPolicy::class,
        \App\Models\Feature::class => \App\Policies\FeaturePolicy::class,
        \App\Models\Item::class => \App\Policies\ItemPolicy::class,
        \App\Models\User::class => \App\Policies\UserPolicy::class,
        \App\Models\Tag::class => \App\Policies\TagPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }

    protected function registerItemGates()
    {
        //
    }
}
