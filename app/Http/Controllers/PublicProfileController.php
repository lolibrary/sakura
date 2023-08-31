<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    /**
     * Construct a new Profile Controller.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.owner');
    }


    /**
     * Get a user's closet (owned items).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function closet(Request $request)
    {
        $requestedUser = $request->get('requestedUser');
        $isOwner = $request->get('isOwner');

        if (!$isOwner && !$requestedUser->public_closet) {
            abort(404);
        }

        $items = $requestedUser->closet($request->input('order'))->paginate(24);

        $user = $requestedUser;
        return view('profile.closet', compact('user', 'items', 'isOwner'));
    }

    /**
     * Get a user's wishlist (favourited items).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function wishlist(Request $request)
    {
        $requestedUser = $request->get('requestedUser');
        $isOwner = $request->get('isOwner');

        if (!$isOwner && !$requestedUser->public_wishlist) {
            abort(404);
        }

        $items = $requestedUser->wishlist($request->input('order'))->paginate(24);

        $user = $requestedUser;
        return view('profile.wishlist', compact('user', 'items', 'isOwner'));
    }
}
