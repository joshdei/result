<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Specify fillable attributes to allow mass assignment
    protected $fillable = ['name', 'class', 'gender', 'arm', 'teacher_id'];

    // A student belongs to a teacher
   
    public function remarks()
    {
        return $this->hasMany(StudentRemark::class);
    }
    
    public function teacher()
    {
        return $this->belongsTo(SchoolTeacher::class, 'teacher_id', 'owner_id');
    }

    // A student can have many marks
    public function marks()
    {
        return $this->hasMany(Mark::class, 'owner_id', 'id'); // Adjust the foreign key and local key as needed
    }
}
