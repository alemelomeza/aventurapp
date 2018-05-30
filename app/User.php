<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role', 'password','dni','address','phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function isAdmin()
    {
      return $this->role == 'administrator' ? true : false;
    }

    public function isCompany()
    {
      return $this->role == 'company' ? true : false;
    }

    public function isNormal()
    {
      return $this->role == 'normal' ? true : false;
    }
}
