<?php

namespace App\Filament\Query;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class TranslatedRelation
{
    public static function make(string $name, string $locale = 'en'): Closure
    {
        return function (Builder $query, ?string $search) use ($name, $locale): void {
            $trans = "{$name}_translations";

            $query->join($trans, "$trans.{$name}_id", '=', Str::plural($name) . '.id')
                ->where("$trans.locale", '=', $locale)
                ->orderBy("$trans.name")
                ->select([
                    "$trans.name",
                    Str::plural($name) . '.id',
                ]);

            if (($search ?? '') !== null) {
                $query->whereLike("$trans.name", "%$search%");
            }
        };
    }
}
