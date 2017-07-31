<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGrade extends Model {

  protected $table = 'student_grade';

  protected $fillable = array('student_matricula', 'grade', 'normalized_grade');

  protected $guarded = ['student_matricula'];


}
