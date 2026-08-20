<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicProfileController extends Controller
{
    /**
     * Construct a new Public Profile Controller.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get a given user's closet (owned items).
     */
    public function closet(Request $request, string $username): View
    {
        $user = User::where('username', $username)->firstOrFail();

        if (! $user->public_closet) {
            if (! auth()->user()?->is($user)) {
                abort(404);
            }
        }

        return view('profile.closet', [
            'user' => $user,
            'items' => $user->closet($request->input('order'))->paginate(24),
        ]);
    }

    /**
     * Get a given user's wishlist (favourited items).
     */
    public function wishlist(Request $request, string $username): View
    {
        $user = User::where('username', $username)->firstOrFail();

        if (! $user->public_wishlist) {
            if (! auth()->user()?->is($user)) {
                abort(404);
            }
        }

        return view('profile.wishlist', [
            'user' => $user,
            'items' => $user->wishlist($request->input('order'))->paginate(24),
        ]);
    }
}
