<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Grammars\PostgresGrammar;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // only run this on postgres. no need any other time.
        if (DB::getSchemaGrammar() instanceof PostgresGrammar) {
            DB::statement("update items set images = '[]'::jsonb where images = '{}'::jsonb");
            DB::statement("update items set images = ( " .
                "select jsonb_agg(element->'attributes'->>'image') " .
                    "filter (where element->'attributes' is not null) " .
                "from jsonb_array_elements(images) as element) " .
                "where images != '[]'::jsonb and jsonb_typeof(images->0) = 'object'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
