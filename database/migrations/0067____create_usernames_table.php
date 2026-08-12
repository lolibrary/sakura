<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usernames', function (Blueprint $table) {
            $table->string('username', 64)->primary();
            $table->uuid('user_id')->index();
            $table->softDeletes();
            $table->timestamps();
        });

        DB::unprepared('insert into usernames
            ("username", "user_id", "created_at", "updated_at")
            select username          as username,
                   id                as user_id,
                   created_at        as created_at,
                   updated_at        as updated_at
            from users
            on conflict do nothing');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usernames');
    }
};
