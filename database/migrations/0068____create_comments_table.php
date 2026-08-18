<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('comments')) {
            // save the old drupal comments to rebuild later
            // no need to reverse this.
            Schema::rename('comments', 'old_comments');
        }

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->uuidMorphs('commentable');
            $table->uuidMorphs('commenter');
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('comments')
                ->cascadeOnDelete();
            $table->text('body');
            $table->timestamp('edited_at')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index(['commentable_type', 'commentable_id', 'parent_id']);
        });
    }

    public function down(): void
    {
        Schema::drop('comments');
    }
};
