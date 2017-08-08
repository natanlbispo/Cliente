<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectManager extends Model
{
  protected $table = 'project_manager';

  protected $fillable = array('project_id', 'professor_matricula', 'student_matricula', 'agencia_fomentadora_id', 'start_date', 'end_date');

  protected $guarded = ['id'];

}
