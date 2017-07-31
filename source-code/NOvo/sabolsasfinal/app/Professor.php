<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model{

  protected $table = 'professor';

  protected $fillable = array('matricula', 'name', 'email', 'hire_date', 'cpf');

  protected $guarded = ['matricula'];


}
