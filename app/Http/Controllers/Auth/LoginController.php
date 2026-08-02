<?php

namespace App\Http\Controllers\Auth;

use App\Enums\SystemUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);

        if ($this->restricted($credentials)) {
            return false; // reject logins for system users
        }

        return $this->guard()->attempt($credentials, remember: true);
    }

    protected function restricted(array $credentials): bool
    {
        return in_array($credentials['email'] ?? '', $this->getRestrictedEmails());
    }

    protected function getRestrictedEmails(): array
    {
        return cache()->remember(
            key: 'system.restricted.emails',
            ttl: 1440,
            callback: fn(): array => User::whereIn('username', SystemUser::cases())
                ->select('email')
                ->pluck('email')
                ->all(),
        );
    }
}
