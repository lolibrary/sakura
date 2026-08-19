<?php

namespace App\Models;

use App\Models\Traits\Cacheable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Visible;

/**
 * @property string $slug The URL slug for this model.
 * @property string $name The name of this model (translated).
 * @property \App\Models\Traits\Collection<string, Item> $items
 */
#[Fillable('name', 'slug')]
#[Visible('name', 'slug', 'url')]
abstract class Informational extends Model implements TranslatableContract
{
    use Cacheable;
    use Translatable;

    public $translatedAttributes = ['name'];
    public $useTranslationFallback = true;

    public function attributesToArray(): array
    {
        $array = parent::attributesToArray();

        return array_merge($array, $this->getTranslationsArray());
    }
}
