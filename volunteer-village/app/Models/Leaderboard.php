<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    use HasFactory;

    protected $table = 'leaderboard';

    protected $fillable = [
        'student_id',
        'Student_rank', // Add Student_rank to fillable
        'Total_hours',  // Add Total_hours to fillable
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
