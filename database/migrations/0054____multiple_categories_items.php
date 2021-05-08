<?php

use App\Models\Item;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MultipleItemCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_item', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('category_id');
            $table->uuid('item_id');
            $table->timestampsTz();

            $table->index(['category_id', 'item_id']);
        });

        Schema::table('category_item', function (Blueprint $table) {
            DB::statement('insert into category_item (category_id, item_id) select category, id from items;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            Schema::drop('category_item');
        });
    }
}
