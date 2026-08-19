<?php

namespace Database\Factories;

use App\Models\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'id' => uuid4(),
        'name' => $faker->name,
        'username' => $username = $faker->unique()->userName,
        'email' => 'bikeshed+'.$username.'@lolibrary.org',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
        'email_verified_at' => now('UTC')->subHour(),
        'banned' => false,
        'level' => User::REGULAR,
    ];
});

$factory->state(User::class, 'junior', [
    'level' => User::JUNIOR_LOLIBRARIAN,
]);

$factory->state(User::class, 'lolibrarian', [
    'level' => User::LOLIBRARIAN,
]);

$factory->state(User::class, 'senior', [
    'level' => User::SENIOR_LOLIBRARIAN,
]);

$factory->state(User::class, 'admin', [
    'level' => User::ADMIN,
]);

$factory->state(User::class, 'developer', [
    'level' => User::DEVELOPER,
]);

$factory->state(User::class, 'banned', [
    'level' => User::BANNED,
    'banned' => true,
]);

$factory->state(User::class, 'unverified', [
    'email_verified_at' => null,
]);
