<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;


    protected $fillable = [
        'owner_id',
        'class',
        'teacher_id',
       
    ];
    public function subjects()
    {
        return $this->hasMany(Classsubject::class, 'class_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // ClassRoom model
public function teacher()
{
    return $this->belongsTo(SchoolTeacher::class,'teacher_id','id');
}

// ClassRoom.php
public function owner()
{
    return $this->belongsTo(User::class, 'owner_id'); // Assuming 'owner_id' references the 'id' in the users table
}




    
}
