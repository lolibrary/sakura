<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

const TABLES = [ 
    'attribute' => 'attributes',
    'brand' => 'brands',
    'category' => 'categories',
    'color' => 'colors',
    'feature' => 'features',
    'tag' => 'tags'
];

class CreateTranslationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /**
         *  For all of our translatable models:
         * - make a new translations table
         * - copy the English language names out of the existing model table
         * - drop the name column from the existing model table
         */

         $creator = function($table) use ($single, $plural) {
            $table->increments('id');
            $table->uuid("{$single}_id");
            $table->string('locale')->index();
            $table->string('name');
            $table->timestampsTz();
          
            $table->unique(["{$single}_id", 'locale']);
            $table->foreign("{$single}_id")->references('id')->on($plural)->onDelete('cascade');
        }

        $migrator = function($table) use ($single, $plural) {
            DB::statement("insert into ? (?, name, locale) select id, name, 'en' from ?", ["${single}_translations", "${single}_id", $plural]);
        }

        foreach(TABLES as $single => $plural) {

            $curryCreator = createCreator($single, $plural);
            $curryMigrator = createMigrator($single, $plural);

            Schema::create("${single}_translations", $creator); 
            Schema::table("${single}_translations", $migrator);
    
            Schema::table($plural, function ($table) {
                $table->dropColumn('name');
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach(TABLES as $single => $plural) {
            Schema::table($plural, function (Blueprint $table) {
                $table->string('name');
            });

            Schema::dropIfExists( "${single}_translations");
        }

    }
}
