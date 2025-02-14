<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Verification;

class Teacher extends Model
{
    use HasFactory;

    // Specify the table associated with the model (optional if it follows Laravel's naming convention)
    protected $table = 'teachers';

    // Specify the primary key of the table (optional if it follows Laravel's naming convention)
    protected $primaryKey = 'Teacher_ID';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'Teacher_name',
    ];

    // Define any relationships with other models
    public function verifications()
    {
        return $this->hasMany(Verification::class, 'Teacher_ID');
    }
}