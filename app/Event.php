<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'activity_id','start_date','end_date','total_reservation_quota','leader_name','status',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
