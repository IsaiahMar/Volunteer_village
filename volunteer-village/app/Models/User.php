<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'dateOfBirth',
        'password',
        'role',
        'student_id',
        'teacher_id',
        'profile_photo_path', // ✅ allow profile photo uploads
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if ($user->role === 'student') {
                $user->student_id = User::whereNotNull('student_id')->max('student_id') + 1 ?? 1000;
            } elseif ($user->role === 'teacher') {
                $user->teacher_id = User::whereNotNull('teacher_id')->max('teacher_id') + 1 ?? 5000;
            }
        });
    }

    public function opportunities()
    {
        return $this->hasMany(VolunteerOpportunity::class, 'organization_id', 'id');
    }

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isTeacher()
    {
        return $this->role === 'teacher';
    }

    public function isOrganization()
    {
        return $this->role === 'organization';
    }

    public function volunteerHours()
    {
        return $this->hasMany(VolunteerHour::class, 'Student_ID', 'student_id');
    }

    /**
     * Accessor to get the full profile photo URL.
     */
    public function getProfilePhotoUrlAttribute()
    {
        return $this->profile_photo_path
            ? asset('storage/' . $this->profile_photo_path)
            : asset('images/default.jpg');
    }
}
