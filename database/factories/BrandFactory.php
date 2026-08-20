<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Brand>
 */
#[UseModel(Brand::class)]
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $word = fake()->unique()->words(2);

        return [
            'slug' => str($word)->slug()->toString(),
            'name' => $word,
            'short_name' => fake()->unique()->slug(1),
            'image' => 'images/default.png',
        ];
    }
}
