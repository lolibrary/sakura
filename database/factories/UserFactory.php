<?php

namespace Database\Factories;

use App\Enums\Level;
use App\Models\User;
use App\Traits\FactoryMetadata;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
#[UseModel(User::class)]
class UserFactory extends Factory
{
    use FactoryMetadata;

    /**
     * Cached password hash for performance.
     *
     * @var string|null
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password1234'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'level' => Level::Junior,
            'metadata' => new Collection,
            'banned' => false,
            'anonymous' => false,
        ];
    }

    public function developer(): static
    {
        return $this->state(fn (array $attributes): array => [
            'level' => Level::Developer,
        ]);
    }

    public function admin(): static
    {
        return $this->state(fn (array $attributes): array => [
            'level' => Level::Admin,
        ]);
    }

    public function trusted(): static
    {
        return $this->state(fn (array $attributes): array => [
            'level' => Level::Trusted,
        ]);
    }

    public function senior(): static
    {
        return $this->state(fn (array $attributes): array => [
            'level' => Level::Senior,
        ]);
    }

    public function lolibrarian(): static
    {
        return $this->state(fn (array $attributes): array => [
            'level' => Level::Lolibrarian,
        ]);
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes): array => [
            'email_verified_at' => null,
        ]);
    }

    public function banned(): static
    {
        return $this->state(fn (array $attributes): array => [
            'banned' => true,
        ]);
    }

    public function anonymous(): static
    {
        return $this->state(fn (array $attributes): array => [
            'anonymous' => true,
        ]);
    }
}
