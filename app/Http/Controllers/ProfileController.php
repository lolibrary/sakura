<?php

namespace App\Http\Controllers;

use App\Helpers\DefaultRule;
use App\Models\User;
use Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

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
     * @return Response|View
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
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $valid = $request->validate([
            'name' => 'required|string|max:255',
            'username' => [
                Rule::excludeUnless(fn () => $user->canChangeUsername()),
                'required',
                DefaultRule::username(),
                DefaultRule::restricted(),
                Rule::unique('usernames')
                    ->whereNotIn('username', $user->usernames->modelKeys()),
            ],
            'email' => ['required', DefaultRule::email(), Rule::unique('users')->ignore($user)],
            'password' => ['nullable', DefaultRule::password(), 'confirmed'],
        ]);

        $usernameUpdate = array_key_exists('username', $valid) && $user->username !== $valid['username'];

        $status = DB::transaction(function () use ($request, $valid, $user, $usernameUpdate) {
            $status = 'ui.auth.update';

            $user->name = $valid['name'];

            // attempt to make or claim the new username
            if ($usernameUpdate && $user->canChangeUsername()) {
                // remove the flag when editing.
                if ($user->metadata->get('can_change_username', false)) {
                    $user->metadata->put('can_change_username', false);
                }

                $user->username = $valid['username'];

                if (! $user->usernames->contains($valid['username'])) {
                    $user->usernames()->create(['username' => $valid['username']]);
                }
            }

            if ($user->email !== $valid['email']) {
                // If they've updated their email address, they need to re-verify it.
                $user->email = $valid['email'];
                $user->email_verified_at = null;

                $status = 'ui.auth.verify_update';
            }

            if ($valid['password']) {
                $user->password = Hash::make($valid['password']);
            }

            $user->public_closet = $request->has('public_closet');
            $user->public_wishlist = $request->has('public_wishlist');

            $user->save();

            return $status;
        });

        if ($status === 'ui.auth.verify_update') {
            event(new Registered($user));
        }

        if ($usernameUpdate) {
            $user->currentUsername()->touch(); // update timestamps on name change
        }

        return redirect('profile')->with('status', $status);
    }

    /**
     * Get a user's closet (owned items).
     *
     * @return Response|RedirectResponse
     */
    public function closet(Request $request)
    {
        return redirect()->route('closet.public', auth()->user()->username);
    }

    /**
     * Get a user's wishlist (favourited items).
     *
     * @return Response|RedirectResponse
     */
    public function wishlist(Request $request)
    {
        return redirect()->route('wishlist.public', auth()->user()->username);
    }
}
