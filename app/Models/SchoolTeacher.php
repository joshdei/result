<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class SchoolTeacher extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'owner_id',         // Owner ID for the school or organization
        'name',             // Teacher's full name
        'phone',            // Phone number for contact purposes
        'class',            // The class the teacher is responsible for
        'email',            // Teacher's email for login and communication
        'password',         // Hashed password for login
        'dob',              // Teacher's date of birth (optional)
        'address',          // Address of the teacher (optional)
        'hire_date',        // Date the teacher was hired (optional)
        'passport_photo',   // File path or URL for the teacher's passport photo
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'dob' => 'date', // Casting dob to date type
        'hire_date' => 'date', // Casting hire_date to date type
        'password' => 'hashed', // Ensures the password is hashed
    ];

    /**
     * Define the relationship with the User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function marks()
    {
        return $this->hasMany(Mark::class, 'owner_id');
    }


}
