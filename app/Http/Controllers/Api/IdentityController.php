<?php

namespace App\Http\Controllers\Api;

use App\Models\User;

class IdentityController extends Controller
{
    /**
     * Return identity information about a user.
     *
     * @return \App\User
     */
    public function show()
    {
        return auth()->user();
    }
}
