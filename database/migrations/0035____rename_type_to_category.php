<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTypeToCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('types', 'categories');

        Schema::table('items', function (Blueprint $table) {
            $table->renameColumn('type_id', 'category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('categories', 'types');

        Schema::table('items', function (Blueprint $table) {
            $table->renameColumn('category_id', 'type_id');
        });
    }
}
