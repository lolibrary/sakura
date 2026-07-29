<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function closet(Request $request, User $user)
    {
        if (! auth()->user()?->can('closet', $user)) {
            abort(404); // nothing to see here
        }

        return view('profile.closet', [
            'user' => $user,
            'items' => $user->closet($request->input('order'))->paginate(24)
        ]);
    }

    /**
     * Get a given user's wishlist (favourited items).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function wishlist(Request $request, User $user)
    {
        if (! auth()->user()?->can('closet', $user)) {
            abort(404); // nothing to see here
        }

        return view('profile.wishlist', [
            'user' => $user,
            'items' => $user->wishlist($request->input('order'))->paginate(24)
        ]);
    }
}
