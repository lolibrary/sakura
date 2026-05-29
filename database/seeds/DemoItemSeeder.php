<?php

use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Feature;
use App\Models\Item;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class DemoItemSeeder extends Seeder
{
    protected const ITEM_SLUG = 'chinese-indie-little-butter-talia-op';

    public function run()
    {
        $submitter = User::query()
            ->where('username', 'testuser')
            ->orWhere('email', 'testuser@example.com')
            ->first();

        if ($submitter) {
            $submitter->forceFill([
                'username' => 'testuser',
                'email' => 'testuser@example.com',
                'name' => 'testuser',
                'level' => User::REGULAR,
            ])->save();
        } else {
            $submitter = User::create([
                'username' => 'testuser',
                'email' => 'testuser@example.com',
                'password' => bcrypt(Str::random(64)),
                'name' => 'testuser',
                'level' => User::REGULAR,
            ]);
        }

        $publisher = User::query()
            ->where('email', config('site.admin.email') ?? 'admin@example.com')
            ->first();

        $brand = Brand::firstOrCreate(
            ['slug' => 'chinese-indie-brand'],
            [
                'name' => 'Chinese Indie Brand',
                'short_name' => 'chinese-indie',
                'image' => null,
            ]
        );

        $category = Category::firstOrCreate(
            ['slug' => 'op'],
            ['name' => 'OP']
        );

        $item = Item::withoutEvents(function () use ($brand, $category, $publisher, $submitter) {
            $item = Item::firstOrNew(['slug' => static::ITEM_SLUG]);

            if (! $item->exists) {
                $item->id = uuid4();
            }

            $item->fill([
                'english_name' => 'Little Butter ~ Talia OP',
                'foreign_name' => '小黄油 塔莉亚 裙子OP',
                'year' => 2024,
                'product_number' => null,
                'price' => '499',
                'currency' => 'cny',
                'notes' => implode("\n", [
                    '<ul>',
                    '<li>This is a Sweet Lolita dress, available in JSK and OP styles, and can be paired with a blouse for a complete look.</li>',
                    '<li>It features a crisscross waist tie design, zipper closure for easy wear and removal, back shirring, and a multi-layered ruffled skirt with several fixed bows.</li>',
                    '<li>If you opt for the halter style, the halter is detachable and secured with buttons, allowing for a variety of styling effects.</li>',
                    '</ul>',
                ]),
                'internal_notes' => 'Seeded demo item for local development.',
                'image' => 'https://lolibrary.global.ssl.fastly.net/images/sjcmZp5YDkTWD7u1725AsLYZEUa545qVJ7W8SNDO.webp',
                'images' => [],
            ]);

            $item->brand()->associate($brand);
            $item->category()->associate($category);
            $item->user_id = $submitter->getKey();
            if ($publisher !== null) {
                $item->publisher_id = $publisher->getKey();
            }
            $item->slug = static::ITEM_SLUG;
            $item->save();
            $item->newQuery()
                ->whereKey($item->getKey())
                ->update([
                    'status' => Item::PUBLISHED,
                    'published_at' => Carbon::parse('2024-12-10 21:59:00', 'UTC'),
                ]);
            $item->refresh();

            return $item;
        });

        $item->categories()->sync([$category->id]);
        $item->features()->sync($this->idsFor(Feature::class, [
            'back-shirring',
            'corset-lacing',
            'detachable-sleeves',
            'lining',
            'short-sleeves',
            'side-zip',
            'tiered-skirt',
        ]));
        $item->colors()->sync($this->idsFor(Color::class, [
            'black-x-white',
            'mint-x-white',
            'pink-x-white',
            'red-x-white',
            'sax-x-white',
            'white',
        ]));
        $item->tags()->sync($this->tagIds([
            'chinese-indie' => 'Chinese Indie',
            'detail-bows' => 'Detail: Bows',
            'fabric-jacquard' => 'Fabric: Jacquard',
            'fabric-satin' => 'Fabric: Satin',
            'pattern-solid-op-jsk-sks-only' => 'Pattern: Solid (OP,JSK & SKs Only)',
        ]));
        $item->attributes()->sync($this->attributeValues([
            'bust' => 'S 84 cm, M 88 cm, L 92 cm, XL 96 cm',
            'country-of-origin' => 'China',
            'length' => '90 cm',
            'material' => 'Subtle Pattern Jacquard Satin',
            'waist' => 'S 64 cm, M 70 cm, L 74 cm, XL 78 cm',
        ]));
    }

    protected function idsFor(string $modelClass, array $slugs): array
    {
        return $modelClass::query()
            ->whereIn('slug', $slugs)
            ->pluck('id')
            ->all();
    }

    protected function tagIds(array $tags): array
    {
        $ids = [];

        foreach ($tags as $slug => $name) {
            $tag = Tag::firstOrCreate(
                ['slug' => $slug],
                ['name' => $name]
            );

            $ids[] = $tag->id;
        }

        return $ids;
    }

    protected function attributeValues(array $attributes): array
    {
        $values = [];

        foreach ($attributes as $slug => $value) {
            $attribute = Attribute::firstOrCreate(
                ['slug' => $slug],
                ['name' => Str::title(str_replace('-', ' ', $slug))]
            );

            $values[$attribute->id] = ['value' => $value];
        }

        return $values;
    }
}
