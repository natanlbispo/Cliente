<?php namespace teste\Http\Controllers;
  use Illuminate\Support\Facades\DB;
  use teste\Alunos;
  use teste\Usuarios;
  use teste\Bolsas;
  use Request;

  class TesteController extends Controller {

    public function list_a(){

      $resposta = Alunos::all();
      return view('telas.listaalunos')-> with('resposta', $resposta);
    }

    public function cad_a(){
      return view('telas.cad_aluno');
    }


    public function adiciona_a(){

      $params = Request::all();
      $resposta = new Alunos($params);
      $resposta->save();

      return redirect ()-> action('TesteController@list_a') ->withInput(Request::only('nome'));
    }

    public function remove($id){

      $resposta = Alunos::find($id);
      $resposta->delete();

      return redirect ()-> action('TesteController@list_a');
    }

    public function edit_a($id){

      $resposta = Alunos::find($id);
      if(empty($resposta)) {
        return "Esse Aluno não existe";
      }
      return view('telas.edita')->with('r', $resposta);
      //var_dump($resposta);
    }

    public function editado_a($id){
      $params = $request->all();
      $produto = Produto:: findOrFail($id);
      $produto->fill($params)->save();

      return redirect ()-> action('TesteController@list_a') ->withInput(Request::only('nome'));
    }

//CONTROLLER USER

  public function list_u(){

    $resposta = Usuarios::all();
    return view('telas.listausuarios')-> with('resposta', $resposta);
  }

  public function cad_u(){
    return view('telas.cad_usuarios');
  }

  public function adiciona_u(){

    $params = Request::all();
    $resposta = new Usuarios($params);
    $resposta->save();

    return redirect ()-> action('TesteController@list_u') ->withInput(Request::only('nome'));
  }

  public function remove_u($id){

    $resposta = Usuarios::find($id);
    $resposta->delete();

    return redirect ()-> action('TesteController@list_u');
  }


  public function edit_u($id){

    $resposta = Usuarios::find($id);
    if(empty($resposta)) {
      return "Esse ususarios não existe";
    }
    return view('telas.editu')->with('r', $resposta);
    //var_dump($resposta);
  }

  public function editado_u($id){
      $params = $request->all();
      $produto = Usuarios:: findOrFail($id);
      $produto->fill($params)->save();

    return redirect ()-> action('TesteController@list_a') ->withInput(Request::only('nome'));
    }


//Controller BOLSAS

  public function list_b(){

    $resposta = Bolsas::all();
    return view('telas.listabolsas')-> with('resposta', $resposta);
  }

  public function cad_b(){
    return view('telas.cad_bolsas');
  }

  public function adiciona_b(){

    $params = Request::all();
    $resposta = new Bolsas($params);
    $resposta->save();

    return redirect ()-> action('TesteController@list_b') ->withInput(Request::only('nome'));
  }

  public function remove_b($id){

    $resposta = Bolsas::find($id);
    $resposta->delete();

    return redirect ()-> action('TesteController@list_b');
  }


  public function edit_b($id){

    $resposta = Bolsas::find($id);
    if(empty($resposta)) {
      return "Essa Bolsa não existe";
    }
    return view('telas.editb')->with('r', $resposta);
    //var_dump($resposta);
  }

  public function editado_b($id){
    $params = $request->all();
    $produto = Bolsas:: findOrFail($id);
    $produto->fill($params)->save();

    return redirect ()-> action('TesteController@list_b') ->withInput(Request::only('nome'));
    }
}
