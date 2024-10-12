<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    use HasFactory;
    protected $fillable = [
        'owner_id',         // Owner ID for the school or organization
        'terms',             // Teacher's full name
       
    ];}
