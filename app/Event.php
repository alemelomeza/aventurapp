<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'activity_id',
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
