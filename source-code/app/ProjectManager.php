<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectManager extends Model
{
  protected $table = 'project_manager';
  
  protected $primaryKey = 'project_id';

  protected $fillable = array('project_id', 'professor_matricula', 'student_matricula', 'start_date', 'end_date');

  protected $guarded = ['id'];

}
