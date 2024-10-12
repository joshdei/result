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
        Schema::create('resumptions', function (Blueprint $table) {
            $table->id();
            $table->string('owner_id');  // e.g., "2021/2023"
            $table->string('date_of_resumption');  // e.g., "2021/2023"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumptions');
    }
};
