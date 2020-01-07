<?php

namespace App\Models;
use Carbon\Carbon;
use Spatie\Activitylog\Traits\LogsActivity;

use Illuminate\Database\Eloquent\Model;

class CourseTime extends Model
{

    use LogsActivity;
    protected $guarded = []; 
    protected static $logUnguarded = true; 

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

     public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // public function time()
    // {   
    //     Carbon::setLocale('fa');
    //     return  Carbon::parse($this->time)->diffForHumans();
    // }

    public function getDescriptionForEvent(string $eventName): string
    {
        return trans('general.time') . $this->time . "" .  trans('general.'. $eventName);
    }
}
