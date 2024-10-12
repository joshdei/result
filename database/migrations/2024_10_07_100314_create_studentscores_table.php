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
        Schema::create('studentscores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');  // Foreign key to student table
            $table->string('subject');                 // Subject name
            $table->decimal('first_test', 5, 2)->nullable();  // 1st test score (Max 10)
            $table->decimal('second_test', 5, 2)->nullable(); // 2nd test score (Max 20)
            $table->decimal('exam', 5, 2)->nullable();        // Exam score (Max 70)
            $table->timestamps();

            // Optionally, define foreign key relationship
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentscores');
    }
};
