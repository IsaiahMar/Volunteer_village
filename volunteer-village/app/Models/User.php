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
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'dateOfBirth',
        'password',
        'role',
        'phone',
        'dateOfBirth',
        'student_id',
        'teacher_id'
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Check if the user is a teacher.
     *
     * @return bool
     */
    public function isTeacher()
    {
        return $this->role === 'teacher'; 
    }

    /**
     * Check if the user is an organization.
     *
     * @return bool
     */
    public function isOrganization()
    {
        return $this->role === 'organization'; 
    }

    public function volunteerHours()
    {
        return $this->hasMany(VolunteerHour::class, 'Student_ID', 'student_id');
    }
}
