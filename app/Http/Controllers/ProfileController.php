<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Construct a new Profile Controller.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }

    /**
     * Get a user's closet (owned items).
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function closet(Request $request)
    {
        $user = Auth::user();
        $items = $user->closet($request->input('order'))->paginate(24);

        return view('profile.closet', compact('user', 'items'));
    }

    /**
     * Get a user's wishlist (favourited items).
     *
     * @return \Illuminate\Http\Response
     */
    public function wishlist()
    {
        $user = Auth::user();
        $items = $user->wishlist()->paginate(24);

        return view('profile.wishlist', compact('user', 'items'));
    }
}
