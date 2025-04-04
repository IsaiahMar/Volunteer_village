<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'verifications';

    // Specify the primary key of the table (optional if it follows Laravel's naming convention)
    protected $primaryKey = 'Verification_id';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'Teacher_ID',
        'Student_ID',
        'Hours_ID',
        'Status',
    ];
}