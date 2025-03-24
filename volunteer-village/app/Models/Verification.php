use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use HasFactory;

<?php

namespace App\Models;


class Verification extends Model
{

    // Specify the table associated with the model
    protected $table = 'verification';

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
