<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use ScoutPostgres\Exceptions\MissingPostgresExtensionException;

return new class extends Migration
{
    public function up(): void
    {
        try {
            DB::statement('CREATE EXTENSION IF NOT EXISTS pg_trgm');
        } catch (Throwable $e) {
            throw MissingPostgresExtensionException::for('pg_trgm');
        }

        try {
            DB::statement('CREATE EXTENSION IF NOT EXISTS unaccent');
        } catch (Throwable $e) {
            throw MissingPostgresExtensionException::for('unaccent');
        }

        DB::statement(<<<'SQL'
            DO $$
            BEGIN
              IF NOT EXISTS (
                  SELECT 1 FROM pg_ts_config WHERE cfgname = 'simple_unaccent'
              ) THEN
                  CREATE TEXT SEARCH CONFIGURATION simple_unaccent (COPY = simple);
                  ALTER TEXT SEARCH CONFIGURATION simple_unaccent
                    ALTER MAPPING FOR hword, hword_part, word WITH unaccent, simple;
              END IF;
            END $$;
        SQL);
    }

    public function down(): void
    {
        DB::statement('DROP TEXT SEARCH CONFIGURATION IF EXISTS simple_unaccent');
    }
};
