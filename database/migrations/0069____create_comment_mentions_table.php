<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comment_mentions', function (Blueprint $table) {
            $table->id(); // pivot table

            $table->foreignId('comment_id')
                ->constrained('comments')
                ->cascadeOnDelete();
            $table->uuidMorphs('commenter');
            $table->timestamps();

            $table->unique(['comment_id', 'commenter_id', 'commenter_type'], 'comment_mentions_unique');
        });
    }

    public function down(): void
    {
        Schema::drop('comment_mentions');
    }
};
