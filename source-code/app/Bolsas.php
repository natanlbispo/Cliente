<?php

namespace teste;

use Illuminate\Database\Eloquent\Model;

class Bolsas extends Model
{
  protected $table = 'bolsas';

  protected $fillable = array('nome', 'duracao');

  protected $guarded = ['id'];
}
    //
