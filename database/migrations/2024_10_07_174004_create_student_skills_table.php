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
      

        Schema::create('student_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->integer('handwriting')->default(0);
            $table->integer('fluency')->default(0);
            $table->integer('sports')->default(0);
            $table->integer('craft')->default(0);
            $table->integer('drawing')->default(0);
            $table->integer('music')->default(0);
            $table->integer('home_management')->default(0);
            $table->integer('swimming')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_skills');
    }
};
