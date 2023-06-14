<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

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
        $lang = $request->session('lang');
        // $lang = 'en';
        TODO: add logic for checking if they have a stored value for language once that's implemented
        if ($lang) {
            App::setLocale($lang);
        }
        // $request->session()->flash('status', $lang);
        return $next($request);
    }
}
