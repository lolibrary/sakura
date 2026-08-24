<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected const array Translated = [
        'category',
        'feature',
        'tag',
        'attribute',
        'color',
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach (static::Translated as $prefix) {
            Schema::table("{$prefix}_translations", function (Blueprint $table) {
                $table->index('name');
            });
        }

        Schema::table('categories', function (Blueprint $table) {
            $table->index('order');
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->index('order');
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->index('visibility');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach (static::Translated as $prefix) {
            Schema::table("{$prefix}_translations", function (Blueprint $table) {
                $table->dropIndex(['name']);
            });
        }

        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex(['order']);
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->dropIndex(['order']);
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->dropIndex(['visibility']);
        });
    }
};
