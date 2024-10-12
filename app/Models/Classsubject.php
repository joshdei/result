<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classsubject extends Model
{   
     use HasFactory;

    protected $fillable = ['class_id', 'subject_name','teacher_id'];

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
   

    public function teacher()
    {
        return $this->belongsTo(SchoolTeacher::class, 'teacher_id');
    }


}
