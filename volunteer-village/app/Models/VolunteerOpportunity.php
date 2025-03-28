<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerOpportunity extends Model
{
    use HasFactory;

    // Define the table name if it doesn't follow Laravel's naming convention
    protected $table = 'volunteer_opportunities';

    // Define the fillable fields
    protected $fillable = [
        'Name',
        'Date',
        'Location',
        'Max_students',
        'Description',
    ];
}