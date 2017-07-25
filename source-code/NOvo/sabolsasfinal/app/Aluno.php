<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model{

  protected $table = 'alunos';

  protected $fillable = array('name', 'orientador', 'matricula', 'nota','cpf', 'email', 'semestre_entrada');

  protected $guarded = ['id'];


}
