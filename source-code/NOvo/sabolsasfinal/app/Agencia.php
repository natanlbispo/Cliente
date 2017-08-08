<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agencia extends Model{

  protected $table = 'agencia_fomentadora';

  protected $fillable = array('id', 'name', 'abr');

  protected $guarded = ['id'];


}
