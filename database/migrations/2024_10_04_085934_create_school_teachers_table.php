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
        Schema::create('school_teachers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID for the teacher
            $table->string('owner_id'); 
            $table->string('name'); // Teacher's full name
            $table->string('phone'); // Phone number for contact
            $table->string('class'); // The class the headteacher is responsible for
            $table->string('email')->unique(); // Unique email for login and communication
            $table->string('password'); // Hashed password for login
            $table->date('dob')->nullable(); // Date of birth (optional)
            $table->string('address')->nullable(); // Address (optional)
            $table->date('hire_date')->nullable(); // Hire date (optional)
            $table->string('passport_photo')->nullable(); // Path to the passport photo (optional)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_teachers');
    }
    
};
