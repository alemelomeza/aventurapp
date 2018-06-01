<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title', 'company_id','description','status','instructions','restrictions','transfers','cost','us_cost','address','latitude','longitude'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
