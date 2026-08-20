<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder as LaravelSeeder;
use Illuminate\Support\Str;
use RuntimeException;

class Seeder extends LaravelSeeder
{
    /**
     * A model to use for seeding.
     */
    protected static string $model = '';

    /**
     * The content we want to seed.
     *
     * @var array<string, string>|array<string>
     */
    protected static array $content = [];

    /**
     * A key used for the "value" or "name" column.
     */
    protected static string $name = 'name';

    /**
     * The column used for the slug.
     */
    protected static string $slug = 'slug';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (static::$content as $slug => $value) {
            if (is_numeric($slug)) {
                // if we have a raw array, slug the value instead.
                $slug = Str::slug($value);
            }

            $model = $this->getModel();

            if ($model->newQuery()->where(static::$slug, $slug)->exists()) {
                continue;
            }

            $model->newQuery()->create([
                static::$slug => $slug,
                static::$name => $value,
            ]);
        }
    }

    /**
     * Get the model for this seeder.
     */
    protected function getModel(): Model
    {
        $model = static::$model;

        if (! class_exists($model)) {
            throw new RuntimeException("Model {$model} not found.");
        }

        /** @phpstan-ignore return.type */
        return new $model;
    }
}
