<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class University extends Model
{
    use SoftDeletes, LogsActivity;

    protected $guarded = [];
    protected static $logUnguarded = true;
    protected $dates = ['deleted_at'];
    
    public function departments()
    {
        return $this->hasMany(\App\Models\Department::class);
    }

    public function students()
    {
        return $this->hasMany(\App\Models\Student::class);
    }

    public function studentsByStatus()
    {
        return $this->students()->select('university_id', 'status_id', \DB::raw('COUNT(students.id) as students_count'))
            ->groupBy('university_id', 'status_id');
    }

    public function logo()
    {  
        if (file_exists('img/app/universities/'.$this->id.'.jpg')) {
            return asset('img/app/universities/'.$this->id.'.jpg');
        } 

        return asset("img/wezarat-logo.jpg");
    }
    
    public function getDescriptionForEvent(string $eventName): string
    {
        return  trans('general.university')   . " ' " . $this->name . " ' " . trans('general.'. $eventName);
    }
}