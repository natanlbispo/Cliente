<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Agencia;
use Request;

class AgenciaController extends Controller
{
	public function listAll(){
	    $resposta = Agencia::all();
	    return view('telas.agencias')-> with('data', $resposta);
	}

	public function cadf(){
		$resposta = Agencia::all();
		return view('telas.cadastraragencia')-> with('data', $resposta);
	}
	public function cadfr(){
		$params = Request::all();
		// var_dump($params);
		// die;
		$today = time();
		$project = new Agencia(
			array(
				'name' => $params['nome'],
				'abv' => $params['nome'],
			)
		);
		$project->save();

		$resposta = Agencia::all();
		return view('telas.cadastraragencia')-> with('data', $resposta);
}

public function delete($id)
{
	$agencia = Agencia::find($id);
	$agencia->ocult = 1;
	$agencia->save();

	return redirect()->action('AgenciaController@cadf');
}






}
