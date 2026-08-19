<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Scout\EngineManager;
use ScoutPostgres\Engines\PostgresEngine;
use ScoutPostgres\Schema\Blueprint as BlueprintMacros;

class ScoutPostgresServiceProvider extends ServiceProvider
{
    private static string $vendor = 'vendor/jonaspauleta/scout-postgres';

    public function boot(): void
    {
        $this->publishes([
            base_path(self::$vendor.'/config/scout-postgres.php') => config_path('scout-postgres.php'),
        ], 'scout-postgres-config');

        $this->publishesMigrations([
            base_path(self::$vendor.'/database/migrations') => database_path('migrations'),
        ], 'scout-postgres-migrations');

        BlueprintMacros::register();
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            base_path(self::$vendor.'/config/scout-postgres.php'), 'scout-postgres',
        );

        resolve(EngineManager::class)->extend('pgsql', fn () => app(PostgresEngine::class));
    }
}
