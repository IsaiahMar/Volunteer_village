<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerOpportunity extends Model
{
    use HasFactory;

    protected $table = 'volunteer_opportunities';

    protected $fillable = [
        'Name',
        'Date',
        'Location',
        'Max_students',
        'Description', 
    ];
    public $timestamps = false; 
}