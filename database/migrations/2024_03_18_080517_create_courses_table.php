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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('fee')->nullable();
            $table->text('description')->nullable();
            $table->string('duration')->nullable();
            $table->string('lecture')->nullable();
            $table->string('project')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('video')->nullable();
            $table->foreignId('mentor_id')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->string('is_active')->nullable();
            $table->string('is_footer')->nullable();
            $table->string('best_selling')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
