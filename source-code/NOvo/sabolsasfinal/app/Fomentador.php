<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fomentador extends Model{

  protected $table = 'fomentador';

  protected $fillable = array('id', 'name', 'abr');

  protected $guarded = ['id'];


}
