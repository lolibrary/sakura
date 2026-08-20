<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localize
{
    /**
     * Set locale for the request.
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $lang = $request->session()->get('lang');
        // TODO: add logic for checking if they have a stored value for language once that's implemented
        if ($lang && in_array($lang, config('translatable.locales'))) {
            App::setLocale($lang);
        }

        return $next($request);
    }
}
