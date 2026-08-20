<?php

namespace App\Contracts;

use Illuminate\Contracts\Auth\Authenticatable;

interface VisibleTo
{
    public function isVisibleTo(?Authenticatable $user): bool;
}
