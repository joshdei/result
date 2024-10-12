<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resumption extends Model
{
    use HasFactory;
    protected $fillable = [
        'owner_id',         // Owner ID for the school or organization
        'date_of_resumption',             // Teacher's full name
       
    ];
}
