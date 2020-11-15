<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class IdentityController extends Controller
{
    /**
     * Return identity information about a user.
     *
     * @return \App\User
     */
    public function identity()
    {
        return auth()->user();
    }

}
