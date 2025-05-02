<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address', 
        'city',
        'state',
        'zip_code',
        'phone',
        'email',
        'principal_name',
        'student_count',
        'description'
    ];

    public function students()
    {
        return $this->hasMany(User::class)->where('role', 'student');
    }

    public function teachers()
    {
        return $this->hasMany(User::class)->where('role', 'teacher');
    }

    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }
}
