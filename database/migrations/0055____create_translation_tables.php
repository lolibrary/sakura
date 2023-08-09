<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Attributes

        Schema::create('attribute_translations', function(Blueprint $table) {
            $table->uuid('id');
            $table->uuid('attribute_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->timestampsTz();
          
            $table->unique(['attribute_id', 'locale']);
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
        });

        Schema::table('attribute_translations', function (Blueprint $table) {
            DB::statement("insert into attribute_translations (attribute_id, name, locale) select id, name, 'en' from attributes;");
        });

        Schema::table('attributes', function ($table) {
            $table->dropColumn('name');
        });

        // Brands

        Schema::create('brand_translations', function(Blueprint $table) {
            $table->uuid('id');
            $table->uuid('brand_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->timestampsTz();
          
            $table->unique(['brand_id', 'locale']);
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });

        Schema::table('brand_translations', function (Blueprint $table) {
            DB::statement("insert into brand_translations (brand_id, name, locale) select id, name, 'en' from brands;");
        });

        Schema::table('brands', function ($table) {
            $table->dropColumn('name');
        });

        // Categories

        Schema::create('category_translations', function(Blueprint $table) {
            $table->uuid('id');
            $table->uuid('category_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->timestampsTz();
          
            $table->unique(['category_id', 'locale']);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        Schema::table('category_translations', function (Blueprint $table) {
            DB::statement("insert into category_translations (category_id, name, locale) select id, name, 'en' from categories;");
        });

        Schema::table('categories', function ($table) {
            $table->dropColumn('name');
        });

        // Colors

        Schema::create('color_translations', function(Blueprint $table) {
            $table->uuid('id');
            $table->uuid('color_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->timestampsTz();
          
            $table->unique(['color_id', 'locale']);
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
        });

        Schema::table('color_translations', function (Blueprint $table) {
            DB::statement("insert into color_translations (color_id, name, locale) select id, name, 'en' from colors;");
        });

        Schema::table('colors', function ($table) {
            $table->dropColumn('name');
        });

        // Features

        Schema::create('feature_translations', function(Blueprint $table) {
            $table->uuid('id');
            $table->uuid('feature_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->timestampsTz();
          
            $table->unique(['feature_id', 'locale']);
            $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade');
        });

        Schema::table('feature_translations', function (Blueprint $table) {
            DB::statement("insert into feature_translations (feature_id, name, locale) select id, name, 'en' from features;");
        });

        Schema::table('features', function ($table) {
            $table->dropColumn('name');
        });

        // Tags

        Schema::create('tag_translations', function(Blueprint $table) {
            $table->uuid('id');
            $table->uuid('tag_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->timestampsTz();
          
            $table->unique(['tag_id', 'locale']);
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });

        Schema::table('tag_translations', function (Blueprint $table) {
            DB::statement("insert into tag_translations (tag_id, name, locale) select id, name, 'en' from tags;");
        });

        Schema::table('tags', function ($table) {
            $table->dropColumn('name');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attributes', function (Blueprint $table) {
            $table->string('name');
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->string('name');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('name');
        });

        Schema::table('colors', function (Blueprint $table) {
            $table->string('name');
        });

        Schema::table('features', function (Blueprint $table) {
            $table->string('name');
        });

        Schema::table('tag', function (Blueprint $table) {
            $table->string('name');
        });

        Schema::dropIfExists('attribute_translations');
        Schema::dropIfExists('brand_translations');
        Schema::dropIfExists('category_translations');
        Schema::dropIfExists('color_translations');
        Schema::dropIfExists('feature_translations');
        Schema::dropIfExists('tag_translations');

    }
}
