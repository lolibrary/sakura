<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_log', function (Blueprint $table) {
            $table->id();
            $table->string('log_name')->nullable()->index();
            $table->text('description');

            $table->string('subject_type')->nullable();
            $table->text('subject_id')->nullable();
            $table->index(['subject_type', 'subject_id'], 'subject');

            $table->string('event')->nullable()->index();
            $table->nullableUuidMorphs('causer', 'causer');
            $table->json('attribute_changes')->nullable();
            $table->json('properties')->nullable();
            $table->timestamps();

            $table->index('created_at');
            $table->index('updated_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_log');
    }

    public function nullableTextMorphs($name, $indexName = null, $after = null)
    {
        $this->string("{$name}_type")
            ->nullable()
            ->after($after);

        $this->text("{$name}_id")
            ->nullable()
            ->after(! is_null($after) ? "{$name}_type" : null);

        $this->index(["{$name}_type", "{$name}_id"], $indexName);
    }
};
