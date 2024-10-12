<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBehavior extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 
        'punctuality', 
        'assignment_submission', 
        'sense_of_responsibility', 
        'neatness',
        'cooperation',
        'participation',
        'respectfulness',
        'overall_behavior',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
