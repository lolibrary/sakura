<?php

namespace Database\Factories;

use App\Enums\Status;
use App\Models\Color;
use App\Models\Feature;
use App\Models\Item;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/* @var \Illuminate\Database\Eloquent\Factory $factory */

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Feature::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->unique()->domainWord,
        'slug' => Str::slug($name),
    ];
});

$factory->define(Color::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->unique()->colorName,
        'slug' => Str::slug($name),
    ];
});

$factory->define(\App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->unique()->name,
        'slug' => Str::slug($name),
        'image' => [],
    ];
});

$factory->define(\App\Models\Brand::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->unique()->name('female'),
        'slug' => Str::slug($name),
        'short_name' => Str::slug($name),
        'image' => [],
    ];
});

$factory->define(\App\Models\Attribute::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->unique()->domainWord,
        'slug' => Str::slug($name),
    ];
});

$factory->define(\App\Models\Tag::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->unique()->word,
        'slug' => Str::slug($name),
    ];
});

$factory->define(Item::class, function (Faker $faker) {
    $englishName = $faker->unique()->sentence(4);

    return [
        'id' => uuid4(),
        'category_id' => uuid4(),
        'brand_id' => uuid4(),
        'user_id' => uuid4(),
        'publisher_id' => null,
        'slug' => Str::slug($englishName),
        'english_name' => $englishName,
        'foreign_name' => $faker->unique()->words,
        'year' => $faker->year,
        'product_number' => $faker->bothify('??#####'),
        'notes' => $faker->paragraphs(2),
        'status' => Item::DRAFT,
        'price' => $faker->numberBetween(100, 40000),
        'currency' => $faker->randomElement(array_keys(App\Models\Item::CURRENCIES)),
        'image' => 'images/default.png',
        'images' => '[{"key": "b11b5722aad69cfb", "layout": "image", "attributes": {"image": "images/default.png"}}]',
    ];
});

$factory->state(Item::class, 'published', []);
$factory->state(Item::class, 'draft', []);

// Hacks Ahoy - these fields are guarded.
$factory->afterMakingState(Item::class, 'draft', function ($item) {
    $item->status = Status::Draft;
    $item->published_at = null;
    $item->publisher_id = null;
});

$factory->afterMakingState(Item::class, 'published', function ($item) {
    $item->status = Status::Published;
    $item->published_at = now('UTC');
    $item->publisher_id = uuid4();
});
