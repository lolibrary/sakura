<?php

namespace App\Http\Controllers\Api;

use App\Models\User;

class IdentityController extends Controller
{
    /**
     * Return identity information about a user.
     */
    public function show(): User
    {
        return auth()->user();
    }
}
