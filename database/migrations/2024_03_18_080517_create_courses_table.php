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
            $table->string('name');
            $table->string('slug');
            $table->string('fee');
            $table->text('description');
            $table->string('duration');
            $table->string('lecture');
            $table->string('project')->nullable();
            $table->string('thumbnail');
            $table->string('video')->nullable();
            $table->foreignId('department_id');
            $table->boolean('is_web')->default(1);
            $table->boolean('is_footer')->default(1);
            $table->boolean('best_selling')->default(1);
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
