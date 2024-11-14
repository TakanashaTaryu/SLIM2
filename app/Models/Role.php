<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }

    public function parents()
    {
        return $this->belongsToMany(ParentModel::class, 'model_has_roles', 'role_id', 'model_id');
    }

    public function administrators()
    {
        return $this->morphedByMany(Administrator::class, 'model', 'model_has_roles', 'role_id', 'model_id');
    }
}
