<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WishlistPivotValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('closet', function (Blueprint $table) {
            $table->string('note')->default('');
        });

        Schema::table('wishlist', function (Blueprint $table) {
            $table->string('note')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('closet', function (Blueprint $table) {
            $table->dropColumn('note');
        });

        Schema::table('wishlist', function (Blueprint $table) {
            $table->dropColumn('note');
        });
    }
}
