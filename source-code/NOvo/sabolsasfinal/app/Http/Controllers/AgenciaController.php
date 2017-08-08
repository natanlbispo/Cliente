<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Agencia;
use Request;

class BolsaController extends Controller
{
	public function listAll(){
	    $resposta = Agencia::all();
	    return view('telas.agencias')-> with('resposta', $resposta);
	}

	public function add(){
		return view('telas.cadastrarAgencia');
	}
}