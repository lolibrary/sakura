<?php

namespace App\Http\Middleware;

if (class_exists(\Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance::class)) {
    abstract class BasePreventRequestsDuringMaintenance extends \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance
    {
    }
} else {
    abstract class BasePreventRequestsDuringMaintenance extends \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode
    {
    }
}

class PreventRequestsDuringMaintenance extends BasePreventRequestsDuringMaintenance
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
