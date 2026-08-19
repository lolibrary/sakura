<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Level;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Attempt to log the user into the application.
     *
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);

        if ($this->guard()->attempt($credentials, remember: true)) {
            if ($this->restricted($this->guard()->user())) {
                $this->guard()->logout();

                return false;
            }

            return true;
        }

        return false;
    }

    /**
     * Prevent restricted users from logging in, even if the password is somehow known.
     *
     * - deactivated
     * - banned
     * - system
     * - amy (owner)
     */
    protected function restricted(User $user): bool
    {
        return in_array(
            $user->level,
            [Level::Deactivated, Level::Banned, Level::System, Level::Amy],
            strict: true,
        );
    }

    /**
     * Validate the user login request.
     *
     * @return void
     *
     * @throws ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => [
                'required', 'string', 'encoding:utf-8',
            ],
            'password' => [
                'required', 'string', 'encoding:utf-8',
            ],
        ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [
            $this->username() => $request->input($this->username()),
            'password' => $request->input('password'),
        ];
    }
}
