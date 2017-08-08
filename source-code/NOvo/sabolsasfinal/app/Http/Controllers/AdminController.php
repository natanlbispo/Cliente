<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Student;
use App\Matraprov;
use App\Bolsa;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homeadmin');

    }

    public function list_u(){

      $resposta = User::all();
      return view('telas.listauser')-> with('resposta', $resposta);
    }

    public function cad_mat(){

      return view('telas.cadmat');

    }
    public function adiciona_m(){

      $params = Request::all();
      $resposta = new Matraprov($params);
      $resposta->save();

      return redirect ()-> action('AdminController@list_u');
    }

    public function list_a(){

      $resposta = Admin::all();
      return view('telas.listadmin')-> with('resposta', $resposta);

      return view('listauser')-> with('resposta', $resposta);
    }

    public function tadmin($id){

      //$params = User::where('id',$id)->first();

      $params = User::find($id);
      //echo $params->name;
      if(empty($params)) {

        return "Esse Aluno não existe";

      }
      Admin::create([
          'name' => $params['name'],
          'cpf' => $params['cpf'],
          'matricula' => $params['matricula'],
          'email' => $params['email'],
          'password' => bcrypt($params['password']),
      ]);

      return redirect ()-> action('AdminController@list_u');;
    }

    public function tuser($id){

      $params = Admin::find($id);
      $params->delete();
      return redirect ()-> action('AdminController@list_u');

    }

    public function removeu($id){

      $resposta = User::find($id);
      $resposta->delete();

      return redirect ()-> action('AdminController@list_u');
    }

}
