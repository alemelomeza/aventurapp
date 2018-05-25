<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name','dni','email','password','contact_name','address','latitude','longitude','logo_path','video_path',
    ];


    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
