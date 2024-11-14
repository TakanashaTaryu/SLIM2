<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;

    // Define many-to-many relationship with Role
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
}
