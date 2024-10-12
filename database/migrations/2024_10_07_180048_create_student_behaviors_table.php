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
        Schema::create('student_behaviors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->integer('punctuality')->nullable();
            $table->integer('assignment_submission')->nullable();
            $table->integer('sense_of_responsibility')->nullable();
            $table->integer('neatness')->nullable();
            $table->integer('cooperation')->nullable();
            $table->integer('participation')->nullable();
            $table->integer('respectfulness')->nullable();
            $table->integer('overall_behavior')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_behaviors');
    }
};
