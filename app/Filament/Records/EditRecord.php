<?php

namespace App\Filament\Records;

use Astrotomic\Translatable\Locales;
use Doriiaan\FilamentAstrotomic\Resources\Pages\EditTranslatable;
use Filament\Resources\Pages\EditRecord as BaseEditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class EditRecord extends BaseEditRecord
{
    use EditTranslatable;

    /**
     * An array of keys inside of this page's `TranslatedTabs`.
     *
     * @var array|string[]
     */
    protected static array $translatedFields = [];

    protected function mutateTranslatedFields(array $data): array
    {
        if (count(static::$translatedFields) === 0) {
            return $data;
        }

        foreach (app(Locales::class)->all() as $locale) {
            // skip missing locales
            if (! Arr::has($data, $locale)) {
                continue;
            }

            $nulls = 0;

            foreach (static::$translatedFields as $field) {
                if (empty(Arr::get($data, "$locale.$field"))) {
                    $nulls++;
                }
            }

            if (count(static::$translatedFields) === $nulls) {
                unset($data[$locale]);
            }
        }

        return $data;
    }


    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($this->mutateTranslatedFields($data));

        return $record;

    }
}
