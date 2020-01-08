<?php

namespace App\Models;

use App\Traits\UseByUniversity;
use App\Traits\UseByDepartment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Subject extends Model
{
    use SoftDeletes, useByUniversity, UseByDepartment, LogsActivity;

    protected $guarded = [];
    protected static $logUnguarded = true;
    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();         

    }

    public function department()
    {
        return $this->belongsTo(\App\Models\Department::class);
    }

    public function courses()
    {
        return $this->hasMany(\App\Models\Course::class);
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return  trans('general.only_subject') . " ' " . $this->title . " ' " .  trans('general.department')   . " ' " . $this->department->name . " ' " .
                trans('general.university')   . " ' " . $this->department->university->name . " ' " .
                trans('general.'. $eventName);
    }

}
