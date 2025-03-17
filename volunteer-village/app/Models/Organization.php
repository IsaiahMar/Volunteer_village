<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $table = 'organization'; // Specify the table name

    protected $fillable = [
        'Org_name',
        'Org_type',
        'Contact_info',
    ];
}