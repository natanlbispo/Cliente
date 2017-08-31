<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areap extends Model{

  public $timestamps = false;
  protected $table = 'areap';


  protected $fillable = array('id', 'nome');

  protected $guarded = ['id'];


}
