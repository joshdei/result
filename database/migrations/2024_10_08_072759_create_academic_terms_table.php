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
    
        Schema::create('academic_terms', function (Blueprint $table) {
            $table->id();
            $table->string('session'); // For academic year, e.g., 2023/2024
            $table->date('start_date');
            $table->string('owner_id');  // e.g., "2021/2023"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_terms');
    }
};
