<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Username;
use Illuminate\Foundation\Auth\RegistersUsers;
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
     *
     * @var string
     */
    protected $redirectTo = '/profile';

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
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'encoding:utf-8', 'max:255'],
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
                Rule::unique('usernames'),
            ],
            'email' => ['required', 'string', 'email', 'encoding:utf-8', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'encoding:utf-8', 'min:12', 'confirmed'],
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    public function check(Request $request)
    {
        return redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
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
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        return redirect()
            ->route('auth.check');
    }
}
