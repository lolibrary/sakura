<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BlogPostTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('topics');

        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->index();
            $table->string('slug')->unique();

            $table->string('title');

            $table->text('preview');
            $table->text('body');

            // a URL to an image to use for the header.
            $table->string('image', 400)->nullable();

            $table->timestampsTz();
            $table->timestampTz('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');

        Schema::create('topics', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->index();
            $table->string('slug')->unique();

            $table->string('title');
            $table->text('body');

            $table->boolean('allow_comments')->default(true);

            $table->timestampsTz();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->index();
            $table->uuid('topic_id')->index();

            $table->text('body');

            $table->timestampsTz();
        });
    }
}
