<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDays extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'days',
        'teacher_id',
    ];
}
