<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model{

  protected $table = 'student';

  protected $fillable = array('matricula', 'name', 'email', 'enrollment_date','student_grade_id', 'cpf');

  protected $guarded = ['matricula'];


}
