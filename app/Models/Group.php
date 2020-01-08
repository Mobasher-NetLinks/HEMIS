<?php

namespace App\Models;

use App\Traits\UseByUniversity;
use App\Traits\UseByDepartment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes, UseByUniversity, UseByDepartment, LogsActivity;

    protected $guarded = [];
    protected static $logUnguarded = true;

    public function students()
    {
        return $this->hasMany(\App\Models\Student::class)->orderBy('name');
    }

    public function courses()
    {
        return $this->hasMany(\App\Models\Course::class);
    }  
    public function department()
    {
        return $this->belongsTO(\App\Models\Department::class);
    } 

    public function loadStudents()
    {
        return $this->load('students');
    }

     public function getDescriptionForEvent(string $eventName): string
    {
        return  trans('general.group') . " "  .  trans('general.department')   . " ' " . $this->department->name . " ' " . trans('general.'. $eventName);
    }
    
}
