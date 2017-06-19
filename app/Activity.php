<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name', 'company_id',
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
