<?php

namespace teste;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
  protected $table = 'usuarios';

  protected $fillable = array('nome', 'matricula', 'email','senha', 'tipo');

  protected $guarded = ['id'];
}
    //
