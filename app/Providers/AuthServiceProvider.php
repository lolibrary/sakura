<?php

namespace App\Providers;

use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Feature;
use App\Models\Item;
use App\Models\Tag;
use App\Models\User;
use App\Policies\AttributePolicy;
use App\Policies\BrandPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\ColorPolicy;
use App\Policies\FeaturePolicy;
use App\Policies\ItemPolicy;
use App\Policies\TagPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Attribute::class => AttributePolicy::class,
        Brand::class => BrandPolicy::class,
        Category::class => CategoryPolicy::class,
        Color::class => ColorPolicy::class,
        Feature::class => FeaturePolicy::class,
        Item::class => ItemPolicy::class,
        User::class => UserPolicy::class,
        Tag::class => TagPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Passport::enablePasswordGrant();
        Password::required();
        Password::min(12);
    }
}
