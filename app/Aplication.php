<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aplication extends Model
{
  protected $fillable = [
      'reply_message', 'reply','user_id','event_id',
  ];

  public function event()
  {
      return $this->belongsTo(Event::class);
  }

  public function user()
  {
      return $this->belongsTo(User::class);
  }
}
