<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function opportunity()
    {
        return $this->belongsTo(VolunteerOpportunity::class, 'opportunity_id');
    }
}
