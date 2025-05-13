<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VerifiedHour extends Model
{
    use HasFactory;

    protected $table = 'verified_hours';

    protected $fillable = [
        'user_id',
        'opportunity_id',
        'hours',
        'status',
        'description',
        'date',
        'picture'
    ];

    protected static function booted()
    {
        static::updated(function ($verifiedHour) {
            if ($verifiedHour->status === 'verified') {
                // Get the student's total verified hours
                $totalHours = self::where('user_id', $verifiedHour->user_id)
                    ->where('status', 'verified')
                    ->sum('hours');

                // Update or create leaderboard entry
                DB::table('leaderboard')->updateOrInsert(
                    ['student_id' => $verifiedHour->user_id],
                    [
                        'Total_hours' => $totalHours,
                        'updated_at' => now()
                    ]
                );

                // Update ranks
                $rankedStudents = DB::table('leaderboard')
                    ->orderByDesc('Total_hours')
                    ->get();

                foreach ($rankedStudents as $index => $student) {
                    DB::table('leaderboard')
                        ->where('student_id', $student->student_id)
                        ->update(['Student_rank' => $index + 1]);
                }
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function opportunity()
    {
        return $this->belongsTo(VolunteerOpportunity::class, 'opportunity_id');
    }
}
