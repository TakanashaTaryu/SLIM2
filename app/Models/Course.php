<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // Define relationships if any, for example, with ClassModel
    public function classes()
    {
        return $this->hasMany(ClassModel::class);
    }
}
