<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        $englishName = $this->faker->unique()->sentence(4);

        return [
            'id' => uuid4(),
            'category_id' => uuid4(),
            'brand_id' => uuid4(),
            'user_id' => uuid4(),
            'publisher_id' => null,
            'slug' => Str::slug($englishName),
            'english_name' => $englishName,
            'foreign_name' => implode(' ', $this->faker->unique()->words()),
            'year' => $this->faker->year,
            'product_number' => $this->faker->bothify('??#####'),
            'notes' => $this->faker->paragraphs(2, true),
            'status' => Item::DRAFT,
            'price' => $this->faker->numberBetween(100, 40000),
            'currency' => $this->faker->randomElement(array_keys(Item::CURRENCIES)),
            'image' => 'images/default.png',
            'images' => '[{"key":"b11b5722aad69cfb","layout":"image","attributes":{"image":"images/default.png"}}]',
        ];
    }

    public function draft()
    {
        return $this->state([
            'status' => Item::DRAFT,
            'published_at' => null,
            'publisher_id' => null,
        ]);
    }

    public function published()
    {
        return $this->state([
            'status' => Item::PUBLISHED,
            'published_at' => now('UTC'),
            'publisher_id' => uuid4(),
        ]);
    }
}
