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
        Schema::create('school_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id'); // Foreign key for the owner
            $table->string('school_name', 255); // School name
            $table->string('school_email', 255)->unique(); // School email (unique)
            $table->string('school_motto', 255); // School motto
            $table->integer('number_of_classes')->unsigned()->default(1); // Number of classes
            $table->integer('number_of_teachers')->unsigned()->default(1); // Number of teachers
            $table->string('school_address', 255); // School address
            $table->enum('owner_gender', ['Male', 'Female', 'Other']); // Owner gender
            $table->string('school_logo')->nullable(); // Path to the school logo (nullable)
            $table->string('owner_passport')->nullable(); // Path to the owner's passport (nullable)
            $table->string('owner_nin')->nullable(); // Path to the owner's NIN (nullable)
            $table->timestamps();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schoolinfos');
    }
};
