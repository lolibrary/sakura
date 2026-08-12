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
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function profile()
    {
        return view('profile.index', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Let users update their info.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $valid = $request->validate([
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                Rule::string()
                    ->min(3)
                    ->max(40)
                    ->alphaDash()
                    ->lowercase()
                    ->doesntStartWith('-', '_')
                    ->doesntEndWith('-', '_'),
                    Rule::notIn([
                        'admin',
                        'administrator',
                        'lolibrary',
                        'official',
                        'senior',
                        'lolibrarian',
                        'system',
                        'user',
                        'developer',
                        'dev',
                    ]),
                Rule::unique('usernames')->whereNotIn('username', $user->usernames->modelKeys()),
            ],
            'email' => ['required', 'string', 'max:255', 'email', Rule::unique('users')->ignore($user)],
            'password' => 'nullable|string|confirmed|min:12',
        ]);

        $status = 'ui.auth.update';

        $user->name = $valid['name'];

        // attempt to make or claim the new username
        if ($user->username !== $valid['username']) {
            $user->username = $valid['username'];

            if (! $user->usernames->contains($valid['username'])) {
                $user->usernames()->create(['username' => $valid['username']]);
            }
        }

        if ($user->email !== $valid['email']) {
            // If they've updated their email address, they need to re-verify it.
            $user->email = $valid['email'];
            $user->email_verified_at = NULL;
            event(new Registered($user));
            $status = 'ui.auth.verify_update';
        }

        if ($valid['password']) {
            $user->password = Hash::make($valid['password']);
        }

        $user->public_closet = $request->has('public_closet');
        $user->public_wishlist = $request->has('public_wishlist');

        $user->save();

        return redirect('profile')->with('status', $status);
    }

    /**
     * Get a user's closet (owned items).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function closet(Request $request)
    {
        return redirect()->route('closet.public', auth()->user());
    }

    /**
     * Get a user's wishlist (favourited items).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function wishlist(Request $request)
    {
        return redirect()->route('wishlist.public', auth()->user());
    }
}
