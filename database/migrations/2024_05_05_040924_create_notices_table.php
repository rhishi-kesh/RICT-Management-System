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
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('person', 10)->comment('m = mentor, s = student, v = visitor, a = admins, b = admissionBooth');
            $table->text('notice');
            $table->string('is_seen')->default('1')->comment('0 = seen, 1 = unseen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};
