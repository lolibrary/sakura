<?php

namespace App\Services\Fastly;

use Illuminate\Support\Facades\Facade;

class Fastly extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'fastly';
    }
}
