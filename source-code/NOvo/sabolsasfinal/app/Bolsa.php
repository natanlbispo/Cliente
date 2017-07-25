<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bolsa extends Model
{
  protected $table = 'bolsas';

  protected $fillable = array('formentador', 'duracao');

  protected $guarded = ['id'];

}
