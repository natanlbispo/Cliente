<?php

namespace teste;

use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    protected $table = 'alunos';

    protected $fillable = array('nome', 'matricula', 'nota', 'data', 'orientador');

    protected $guarded = ['id'];
}
