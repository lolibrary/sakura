<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // we've been using json/string fields for this for years
        Schema::dropIfExists('images');
        Schema::dropIfExists('image_item');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('donations');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('nova_field_attachments');
        Schema::dropIfExists('nova_notifications');
        Schema::dropIfExists('nova_pending_field_attachments');

        if (Schema::hasColumn('items', 'category_id')) {
            Schema::table('items', function (Blueprint $table) {
                $table->dropColumn(['category_id']);
            });
        }

        if (Schema::hasColumns('items', ['image_id', 'verified_at'])) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn(['image_id', 'verified_at']);
            });
        }

        // we use redis in prod
        DB::table('sessions')->truncate();
        DB::table('jobs')->truncate();
    }
};
