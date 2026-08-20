<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\DefaultRule;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     */
    protected string $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware(['auth', 'verified'])->only('check');
    }

    /**
     * Get a validator for an incoming registration request.
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'encoding:utf-8', 'max:255'],
            'username' => [
                'required',
                DefaultRule::username(),
                DefaultRule::restricted(),
                Rule::unique('usernames'),
            ],
            'email' => ['required', DefaultRule::email(), 'unique:users'],
            'password' => [DefaultRule::password(), 'encoding:utf-8', 'confirmed'],
        ]);
    }

    /**
     * The user has been registered.
     *
     * @return RedirectResponse
     */
    public function check(Request $request)
    {
        return redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     */
    protected function create(array $data): User
    {
        return DB::transaction(function () use ($data): User {
            /** @var User $user */
            $user = User::create([
                'name' => $data['name'],
                'email' => str($data['email'])->lower()->toString(),
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
            ]);

            $user->usernames()->create(['username' => $data['username']]);

            return $user;
        });
    }

    /**
     * The user has been registered.
     *
     * @return RedirectResponse
     */
    protected function registered(Request $request, $user)
    {
        return redirect()
            ->route('auth.check');
    }
}
