<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Areap;
use Request;

class AreapController extends Controller{

	public function apq(){
		return view('telas.cadastroareapesquisa');
	}


	public function apqr(){
		$params = Request::all();

		$project = new Areap(
			array(
				'name' => $params['nome'],
			)
		);
		$project->save();

		return redirect()-> action('AreapController@apq')->withInput(Request::only('nome'));
}

}
