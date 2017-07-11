<?php namespace teste\Http\Controllers;
  use Illuminate\Support\Facades\DB;
  use teste\Alunos;
  use Request;

  class TesteController extends Controller {

    public function list_a(){

      $resposta = Alunos::all();
      return view('telas.listaalunos')-> with('resposta', $resposta);
    }

    public function adiciona_a(){

      $params = Request::all();
      $resposta = new Alunos($params);
      $resposta->save();

      /*
        $resposta->nome = Request::input('nome');
        $resposta->matricula = Request::input('matricula');
        $resposta->nota = Request::input('nota');
        $resposta->data = Request::input('data');
        $resposta->orientador = Request::input('orientador');
        //DB::insert('insert into alunos (nome, matricula, nota, data, orientador) values (?,?,?,?,?)', array($nome, $matricula, $nota, $data, $orientador));
        $resposta->save();*/
        //colocar confirmação na tela
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
      // retorna uma view com os detalhes

    public function list_c(){

      $resposta = DB::select('select * from usuarios');
      return view('telas.listacord')-> with('resposta', $resposta);
    }
    public function edit_c(){
      // retorna uma view com os detalhes
    }

    public function cad_a(){
      return view('telas.cad_aluno');
    }

    public function cad_u(){
      return view('telas/cad_usuario');
    }



  }
