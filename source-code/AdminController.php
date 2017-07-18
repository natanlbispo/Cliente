<?php

namespace App\Http\Controllers;
use App\Admin;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
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
      return view('listauser')-> with('resposta', $resposta);
    }


        public function tadmin($id){

          //$params = User::where('id',$id)->first();

          $params = User::find($id);
          echo $params->name;
          if(empty($params)) {
            return "Esse Aluno não existe";
          }
          Admin::create([
              'name' => $params['name'],
              'email' => $params['email'],
              'password' => bcrypt($params['password']),
          ]);
          //$resposta = new Admin(array($params->name,$params->email, $params->password));
          //$resposta->save();
          //var_dump($params);
          //return redirect ()-> action('AdminController@list_u');
          //var_dump($resposta)
        /*
        public function tadmin_u($id , Request $request){
          $params = $request->all();
          */
          return view('/home');
        }
    /*
    public function tadmin($id){

      $params = User::find($id);

      $resposta = new Admin($params);
      $resposta->save();
      return redirect ()-> action('AdminController@list_u');

    }*/


}
