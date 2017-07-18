<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Matraprov extends Model
{
  use Notifiable;

  protected $fillable = [
      'email',
  ];

}
