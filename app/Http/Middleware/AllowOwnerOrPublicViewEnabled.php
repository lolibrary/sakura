<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AllowOwnerOrPublicViewEnabled
{
    public function handle($request, Closure $next)
    {
        $currentUser = Auth::user();
        $username = $request->route('username');
        $requestedUser = User::where('username', $username)->firstOrFail();
        $isOwner = (!empty($currentUser) && $currentUser->id == $requestedUser->id);
        $request->attributes->add(['isOwner' => $isOwner, 'requestedUser' => $requestedUser]);

        return $next($request);
    }
}
