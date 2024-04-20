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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id', '20');
            $table->foreignId('batch_id')->nullable();
            $table->string('name');
            $table->string('profile')->nullable();
            $table->string('slug');
            $table->string('fName');
            $table->string('mName');
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable()->unique();
            $table->string('address');
            $table->string('mobile');
            $table->string('qualification')->nullable();
            $table->string('profession')->nullable();
            $table->string('guardianMobileNo')->nullable();
            $table->string('course_id');
            $table->string('paymentType','5');
            $table->string('pay')->nullable();
            $table->string('due')->nullable();
            $table->string('total')->nullable();
            $table->string('paymentNumber')->nullable();
            $table->string('admissionFee','5')->nullable()->default('n')->comment('n = No, y = Yes');
            $table->string('discount')->nullable();
            $table->string('class_days')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
