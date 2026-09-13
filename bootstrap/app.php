<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

use App\Http\Middleware\Localize;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Sentry\Laravel\Integration;
use Symfony\Component\HttpFoundation\Request as Header;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->appendToGroup('web', [
            Localize::class,
        ]);

        $middleware->redirectTo(
            guests: '/',
            users: '/library',
        );

        $middleware->trimStrings();

        $middleware->trustProxies(
            headers: Header::HEADER_X_FORWARDED_FOR |
                Header::HEADER_X_FORWARDED_HOST |
                Header::HEADER_X_FORWARDED_PORT |
                Header::HEADER_X_FORWARDED_PROTO |
                Header::HEADER_X_FORWARDED_AWS_ELB
        );

        $middleware->encryptCookies();
        $middleware->throttleWithRedis();
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        Integration::handles($exceptions);

        $exceptions->shouldRenderJsonWhen(
            static fn(Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
