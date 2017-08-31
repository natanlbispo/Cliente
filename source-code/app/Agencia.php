<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agencia extends Model{

  public $timestamps = false;
  protected $table = 'agencia_fomentadora';


  protected $fillable = array('id', 'name', 'abv');

  protected $guarded = ['id'];


}
