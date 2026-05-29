<?php

namespace Database\Factories;

use App\Models\Feature;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FeatureFactory extends Factory
{
    protected $model = Feature::class;

    public function definition()
    {
        $name = $this->faker->unique()->domainWord;

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
