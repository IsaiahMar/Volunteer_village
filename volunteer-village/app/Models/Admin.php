<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

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
    ];

    public function getAuthPassword()
    {
        return $this->admin_pass;
    }
    
    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return true; // All users in the Admin model are admins
    }
}
