<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $table = 'project';

  protected $fillable = array('id', 'name', 'start_date', 'end_date');

  protected $guarded = ['id'];

}
