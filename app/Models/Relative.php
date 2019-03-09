<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Relative extends Model
{
    
    public $timestamps = false;
    protected $guarded = [];
    

    public function students()
    {
        return $this->belongsTo(\App\Models\Student::class);
    }
}
