<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerHour extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'volunteer_hours';

    // Specify the primary key of the table (optional if it follows Laravel's naming convention)
    protected $primaryKey = 'Hours_ID';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'Hours_Logged',
        'Date_logged',
        'Verified',
    ];
}