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
            $table->string('name');
            $table->string('fName');
            $table->string('mName');
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable()->unique();
            $table->string('address');
            $table->string('mobile');
            $table->string('qualification');
            $table->string('profession')->nullable();
            $table->string('guardianMobileNo');
            $table->string('courseName');
            $table->string('paymentType','5')->default('c')->comment('c = Cash, b = Bkash, n = Nagad');
            $table->string('pay');
            $table->string('due')->nullable();
            $table->string('total');
            $table->string('bkashNo')->nullable();
            $table->string('admissionFee','5')->nullable()->default('n')->comment('n = No, y = Yes');
            $table->string('discount')->nullable();
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
