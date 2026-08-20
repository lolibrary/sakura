<?php

namespace Database\Factories;

use App\Enums\Status;
use App\Models\Item;
use App\Traits\FactoryMetadata;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<Item>
 */
#[UseModel(Item::class)]
class ItemFactory extends Factory
{
    use FactoryMetadata;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'english_name' => fake()->words(5),
            'foreign_name' => fake()->words(6),
            'slug' => fake()->unique()->slug(),
            'status' => Status::Draft,
            'metadata' => new Collection,
            'published_at' => null,
        ];
    }

    public function notes(): static
    {
        return $this->state(fn (array $attributes): array => [
            'notes' => fake()->randomHtml(),
        ]);
    }

    public function internalNotes(): static
    {
        return $this->state(fn (array $attributes): array => [
            'internal_notes' => fake()->randomHtml(),
        ]);
    }
}
