<?php

namespace App\Filament\Query;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class TranslatedRelation
{
    public static function make(
        string $name, string $locale = 'en', ?string $table = null, string $column = 'id'
    ): Closure {
        return function (Builder $query, ?string $search) use ($name, $locale, $table, $column): void {
            $trans = "{$name}_translations";
            $table ??= Str::plural($name);

            $query->join($trans, "$trans.{$name}_id", '=', "$table.$column")
                ->where("$trans.locale", '=', $locale)
                ->orderBy("$trans.name")
                ->select([
                    "$trans.name",
                    "$table.$column",
                ]);

            if (($search ?? '') !== null) {
                $query->whereLike("$trans.name", "%$search%");
            }
        };
    }
}
