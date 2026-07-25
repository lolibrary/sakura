<?php

namespace App\Services\Fastly;

use Illuminate\Support\Facades\Facade;

/**
 * @method \Fastly\Api\PurgeApi purge()
 */
class Fastly extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'fastly';
    }
}
