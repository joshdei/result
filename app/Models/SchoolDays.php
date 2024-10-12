<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolDays extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',         // Owner ID for the school or organization
        'days', 
    ];

}
