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

         function creator($single, $plural, $table) {
            $table->increments('id');
            $table->uuid($single .'_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->timestampsTz();
          
            $table->unique([$single .'_id', 'locale']);
            $table->foreign($single .'_id')->references('id')->on($plural)->onDelete('cascade');
        }

        function migrator($single, $plural, $table) {
            DB::statement("insert into ".$single ."_translations (".$single ."_id, name, locale) select id, name, 'en' from ".$plural .";");
        }

        function createCreator($single, $plural) {
            return function($table) use($single, $plural) {
              creator($single, $plural, $table);
            };
        }

        function createMigrator($single, $plural) {
            return function($table) use($single, $plural) {
              migrator($single, $plural, $table);
            };
        }

         foreach(TABLES as $single => $plural) {

            $curryCreator = createCreator($single, $plural);
            $curryMigrator = createMigrator($single, $plural);

            Schema::create($single .'_translations', $curryCreator); 
            Schema::table($single .'_translations', $curryMigrator);
    
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

            Schema::dropIfExists( $single .'_translations');
        }

    }
}
