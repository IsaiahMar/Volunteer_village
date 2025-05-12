<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $table = 'admin';
    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'admin_name',
        'admin_pass',
        'admin_type',
        'contact_info',
    ];

    protected $hidden = [
        'admin_pass',
        'remember_token',
    ];

    protected $casts = [
        'admin_pass' => 'hashed',
    ];

    public function getAuthPassword()
    {
        return $this->admin_pass;
    }

    public function getAuthIdentifierName()
    {
        return 'contact_info';
    }

    public function getAuthIdentifier()
    {
        return $this->contact_info;
    }

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return true;
    }
}
