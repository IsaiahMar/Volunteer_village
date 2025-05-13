<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'profile_photo_path',
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

    protected $hidden = [
        'password',
        'remember_token',
    ];

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

    public function getProfilePhotoUrlAttribute()
    {
        return $this->profile_photo_path
            ? asset('storage/' . $this->profile_photo_path)
            : asset('images/default.jpg');
    }

    public function getHomeRoute()
    {
        switch ($this->role) {
            case 'student':
                return route('student.home');
            case 'teacher':
                return route('teacher.home');
            case 'organization':
                return route('organization.home');
            case 'admin':
                return route('admin.dashboard');
            default:
                return route('dashboard');
        }
    }
}
