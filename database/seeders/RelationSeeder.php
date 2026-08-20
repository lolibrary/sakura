<?php

namespace Database\Seeders;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\error;

class RelationSeeder extends Seeder
{
    /**
     * Set up relationships from an SQL file.
     *
     * Note: for testing, make sure there is a version that matches the connection name.
     */
    public function run(): void
    {
        $connection = DB::getDefaultConnection();
        $path = database_path("queries/{$connection}/relations.sql");

        if (! file_exists($path)) {
            error("Please set up relations.sql for connection $connection");
            return;
        }

        $contents = file_get_contents($path);

        DB::unprepared($contents); /** @phpstan-ignore argument.type */
    }
}
