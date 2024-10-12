<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRemarksTable extends Migration
{
    public function up()
    {
        Schema::create('student_remarks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('teacher_id'); // If you want to track which teacher made the remark
            $table->string('remark');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('student_remarks');
    }
}
