<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Localize as Middleware;

class Localize extends Middleware
{
    /**
     * Set locale for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function handle($request, Closure $next)
    {
        $lang = $request->session()->get('lang');
        // TODO: add logic for checking if they have a stored value for language once that's implemented
        if ($lang) {
            App::setLocale($lang);
        }
        return $next($request);
    }
}
