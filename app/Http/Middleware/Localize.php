<?php

namespace App\Http\Middleware;

use Closure;

class Localize
{
    /**
     * Set locale for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function handle($request, Closure $next)
    {
        $lang = session('lang');
        $lang = 'en';
        // TODO: add logic for checking if they have a stored value for language once that's implemented
        if ($lang) {
            App::setLocale($lang);
        }
        return $next($request);
    }
}
