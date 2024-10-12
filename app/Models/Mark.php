<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_test_mark',
        'second_test_mark',
        'exam_mark',
        'owner_id', 
    ];

    public function teacher()
    {
        return $this->belongsTo(SchoolTeacher::class, 'owner_id');
    }
}
