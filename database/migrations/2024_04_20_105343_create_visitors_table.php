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
            $table->foreignId('counseling_id')->nullable();
            $table->string('status')->nullable();
            $table->string('name')->nullable();
            $table->string('mobile',20)->nullable();
            $table->string('email')->unique();
            $table->foreignId('course_id');
            $table->string('address')->nullable();
            $table->string('amount')->nullable();
            $table->text('visitor_comment')->nullable();
            $table->string('gender')->nullable();
            $table->string('ref_name')->nullable();
            $table->string('admission_booth_name')->nullable();
            $table->string('calling_person')->nullable();
            $table->text('comments')->nullable();
            $table->string('call_count')->nullable();
            $table->text('calling_date')->nullable();
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
