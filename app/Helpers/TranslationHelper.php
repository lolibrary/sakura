<?php

namespace App\Helpers;

use App\Models\Informational;
use Illuminate\Contracts\Cache\Repository;

class TranslationHelper
{
    public function __construct(protected Repository $repo)
    {
        //
    }

    public function get(Informational $model, ?string $locale = null, ?string $name = null): ?string
    {
        $locale ??= app()->getLocale();
        $name ??= $this->getAttributeName($model);

        if ($name === null) {
            throw new \RuntimeException('could not work out which translated attribute to use for ' . $model::class);
        }

        // memoize this so we don't repeatedly fetch the same thing
        return $this->repo->sear($this->key($model, $locale, $name), fn() => $this->getTranslation($model, $locale, $name));
    }

    protected function getTranslation(Informational $model, string $locale, string $name): ?string
    {
        return cache()
            ->tags([$model::class, 'translations'])
            ->sear("{$model->getKey()}:$name:$locale", fn() => $model->getTranslation($locale)->getAttribute($name));
    }

    protected function getAttributeName(Informational $model): ?string
    {
        return count($model->translatedAttributes) === 1 ? $model->translatedAttributes[0] : null;
    }

    protected function key(Informational $model, string $locale, string $name): string
    {
        return str($model::class)->classBasename()->lower()->toString().":{$model->getKey()}:$name:$locale";
    }
}
