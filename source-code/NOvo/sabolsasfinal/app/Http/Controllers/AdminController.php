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

  //Funções para Alunos

  public function cad_al(){
    return view('telas.cad_aluno');
  }


  

  public function normalize_grade() {
    $studentList = StudentGrade::get();

    $standartDeviation = $this->calcStandartDeviation($studentList);

    foreach ($studentList as $student) {
      // (Nota Média do Aluno)/Desvio Padrão))* 1,67 + 5.
      $normalized = (($student->grade / $standartDeviation) * 1.67) + 5;
      $student->update(['normalized_grade' => $normalized]);
    }

  }

  public function calcStandartDeviation(&$studentList){
    if (isset($studentList) && !empty($studentList)) {
      $points = count($studentList);
      $sum = 0;
      foreach ($studentList as $student) {
        $sum = $sum + $student->grade;
      }

      $average = $sum / $points;

      $sum = 0;
      foreach ($studentList as $student) {
        $sum = $sum + (abs($student->grade - $average) ** 2) ;
      }

      return sqrt($sum / $points);
    }
  }



  // BOLSA

  public function list_b(){

    $resposta = Bolsa::all();
    return view('telas.listabolsas')-> with('resposta', $resposta);
  }

  public function cad_b(){
    return view('telas.cad_bolsas');
  }


  public function adiciona_b(){

    $params = Request::all();
    $resposta = new Bolsa($params);
    $resposta->save();

    return redirect ()-> action('AdminController@list_b') ->withInput(Request::only('nome'));
  }

  public function removeb($id){

    $resposta = Bolsa::find($id);
    $resposta->delete();

    return redirect ()-> action('AdminController@list_b');
  }

  public function edit_b($id){

    $resposta = Bolsa::find($id);
    if(empty($resposta)) {
      return "Esse Bolsa não existe";
    }
    return view('telas.editb')->with('r', $resposta);
    //var_dump($resposta);
  }

  public function editado_b($id){

    $params = Request::all();
    $produto = Bolsa::findOrFail($id);
    $produto->fill($params)->save();

    return redirect ()-> action('AdminController@list_b') ->withInput(Request::only('nome'));
  }

}
