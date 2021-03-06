<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentStatus extends Model
{
    protected $guarded = [];
    
    public function students()
    {
        return $this->hasMany(\App\Models\Student::class);
    }
}