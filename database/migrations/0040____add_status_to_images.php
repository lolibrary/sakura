<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\PostgresConnection;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddStatusToImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->integer('status')->default(0);
            $table->string('uploaded_filename')->nullable();
        });

        if (DB::connection() instanceof PostgresConnection) {
            DB::statement('alter table images alter column name drop not null');
            DB::statement('alter table images alter column filename drop not null');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('status', 'uploaded_filename');
        });

        if (DB::connection() instanceof PostgresConnection) {
            DB::statement('alter table images alter column name set not null');
            DB::statement('alter table images alter column filename set not null');
        }
    }
}
