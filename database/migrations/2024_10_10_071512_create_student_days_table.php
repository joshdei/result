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
        Schema::create('student_days', function (Blueprint $table) {
            $table->id();
            $table->string('student_id'); // Assuming you have a students table
            $table->string('teacher_id'); // Assuming you have a teachers table
            $table->integer('days'); // Store the number of days
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_days');
    }
};
