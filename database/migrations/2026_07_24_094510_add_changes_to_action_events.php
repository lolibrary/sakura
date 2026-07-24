<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('action_events', function (Blueprint $table) {
            $table->dropColumn('model_id');
        });

        Schema::table('action_events', function (Blueprint $table) {
            $table->text('original')->nullable();
            $table->text('changes')->nullable();
            $table->uuid('model_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('action_events', function (Blueprint $table) {
            $table->dropColumn('original', 'changes', 'model_id');
        });

        Schema::table('action_events', function (Blueprint $table) {
            $table->unsignedBigInteger('model_id')->nullable();
        });
    }
};
