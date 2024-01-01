<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;

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
        $isOwner = true;

        return view('profile.index', compact('user', 'isOwner'));
    }

    /**
     * Let users update their info.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'min:3',
                'max:40',
                'regex:/^[^-_][0-9a-z_-]+$/u',
                Rule::unique('users')->ignore($user),
            ],
            'email' => ['required', 'string', 'max:255', 'email', Rule::unique('users')->ignore($user)],
            'password' => 'nullable|string|confirmed|min:12',
        ]);

        $status = 'ui.auth.update';

        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];

        if ($user->email != $validatedData['email']) {
            // If they've updated their email address, they need to re-verify it.
            $user->email = $validatedData['email'];
            $user->email_verified_at = NULL;
            event(new Registered($user));
            $status = 'ui.auth.verify_update';
        }

        if ($validatedData['password']) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->public_closet = $request->has('public_closet') == '1' ? '1' : '0';
        $user->public_wishlist = $request->has('public_wishlist') == '1' ? '1' : '0';

        $user->save();
        
        return redirect('profile')->with('status', $status);
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

        return redirect()->route('public_closet', ['username' => $user->username]);
    }

    /**
     * Get a user's wishlist (favourited items).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function wishlist(Request $request)
    {
        $user = Auth::user();
        return redirect()->route('public_wishlist', ['username' => $user->username]);
    }
}
