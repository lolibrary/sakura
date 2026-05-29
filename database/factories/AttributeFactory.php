<?php

namespace Database\Factories;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AttributeFactory extends Factory
{
    protected $model = Attribute::class;

    public function definition()
    {
        $name = $this->faker->unique()->domainWord;

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
