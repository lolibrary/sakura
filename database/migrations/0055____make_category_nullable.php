<?php

use App\Models\Item;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeCategoryNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->uuid('category_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Item::whereNull('category_id')->count() > 0) {
            throw new RuntimeException('Cannot make items.category_id non-null if we have any null values in the database');
        }

        Schema::table('items', function (Blueprint $table) {
            $table->uuid('category_id')->change();
        });
    }
}
