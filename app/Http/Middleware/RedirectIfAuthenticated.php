<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ?string $guard = null): mixed
    {
        if (Auth::guard($guard)->check()) {
            // conditional: redirect home if regular user, otherwise /library
            if (Auth::guard($guard)->user()->junior()) {
                return redirect('/library');
            }

            return redirect('/');
        }

        return $next($request);
    }
}
