<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'school_name',
        'school_email',
        'school_address',
        'school_motto',
        'number_of_classes',
        'number_of_teachers',
        'owner_gender',
        'school_logo',
        'owner_passport',
        'owner_nin',
    ];

    /**
     * Relationship: Each SchoolInfo belongs to a User (Owner).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
