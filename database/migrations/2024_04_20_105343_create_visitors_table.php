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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('counseling')->nullable();
            $table->string('status')->nullable();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->unique();
            $table->string('course_name')->nullable();
            $table->string('course_id');
            $table->string('address')->nullable();
            $table->string('amount')->nullable();
            $table->string('visitor_comment')->nullable();
            $table->string('gender')->nullable();
            $table->string('ref_name')->nullable();
            $table->string('admission_booth_name')->nullable();
            $table->string('admission_booth_number')->nullable();
            $table->string('calling_person')->nullable();
            $table->string('comments')->nullable();
            $table->string('call_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
