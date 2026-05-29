<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $username = $this->faker->unique()->userName;

        return [
            'id' => uuid4(),
            'name' => $this->faker->name,
            'username' => $username,
            'email' => 'bikeshed+'.$username.'@lolibrary.org',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'remember_token' => Str::random(10),
            'email_verified_at' => now('UTC')->subHour(),
            'banned' => false,
            'level' => User::REGULAR,
        ];
    }

    public function junior()
    {
        return $this->state([
            'level' => User::JUNIOR_LOLIBRARIAN,
        ]);
    }

    public function lolibrarian()
    {
        return $this->state([
            'level' => User::LOLIBRARIAN,
        ]);
    }

    public function senior()
    {
        return $this->state([
            'level' => User::SENIOR_LOLIBRARIAN,
        ]);
    }

    public function admin()
    {
        return $this->state([
            'level' => User::ADMIN,
        ]);
    }

    public function developer()
    {
        return $this->state([
            'level' => User::DEVELOPER,
        ]);
    }

    public function banned()
    {
        return $this->state([
            'level' => User::BANNED,
            'banned' => true,
        ]);
    }

    public function unverified()
    {
        return $this->state([
            'email_verified_at' => null,
        ]);
    }
}
