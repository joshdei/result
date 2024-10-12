<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRemark extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'remark',
        'teacher_id', // Optional if you want to track which teacher gave the remark
    ];

    // Relationship with the Student model
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Relationship with the Teacher model (optional)
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
    