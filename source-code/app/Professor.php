<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model{

  protected $table = 'professor';
  
  // protected $primaryKey = 'matricula';

  protected $fillable = array('id', 'name', 'email', 'cpf', 'deleted');

  protected $guarded = ['id'];


}
