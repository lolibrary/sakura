<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition()
    {
        $name = $this->faker->unique()->name('female');

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'short_name' => Str::slug($name),
            'image' => [],
        ];
    }
}
