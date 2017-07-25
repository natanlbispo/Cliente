<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Aluno;
use Request;

class indexController extends Controller
{
public function list_al(){

  $resposta = Aluno::all();
  return view('telas.listaalunos2')-> with('resposta', $resposta);
}

}
