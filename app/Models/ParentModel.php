<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    use HasFactory;
    protected $table = 'parents';
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 
        'relationship_to_student', 'profile_picture'
    ];

    public function getRoleAttribute()
    {
        return $this->attributes['role'] ?? 'parent';
    }

    public function roles()
    {
        return $this->morphToMany(Role::class, 'model', 'model_has_roles', 'model_id', 'role_id')
                ->withPivot('model_type');
    }
}

