<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSkill extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 
        'handwriting', 
        'fluency', 
        'sports', 
        'craft', 
        'drawing', 
        'music', 
        'home_management', 
        'swimming'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
