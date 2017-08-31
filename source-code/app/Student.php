<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model{

  protected $table = 'student';

  protected $fillable = array('id', 'name', 'email', 'enrollment_date','cpf','student_grade_id', 'deleted');

  protected $guarded = ['id'];

}
