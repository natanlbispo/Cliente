<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Student;
use App\Professor;
use Request;

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

    // Users
    public function listAll(){
      $userList = DB::table('users')
                      ->join('professor', 'professor.id', '=', 'users.professor_matricula')
                      ->select('users.id as user_id', 
                                'users.professor_matricula as users_professor_matricula',
                                'users.admin as user_admin',
                                'users.access as user_access',
                                'professor.name as professor_name',
                                'professor.email as professor_email')
                      ->where('professor.deleted', '=', '0')
                      ->get();

      return view('telas.users')->with('data', $userList);
    }

    public function setAdmin($id){
      $user = User::find($id);
      if(empty($user)) {
        return "Esse usuário não existe";
      }
      $user->admin = 1;
      $user->save();

      return redirect()->action('AdminController@listAll');
    }

    public function notSetAdmin($id){
      $user = User::find($id);
      if(empty($user)) {
        return "Esse usuário não existe";
      }
      $user->admin = 0;
      $user->save();

      return redirect()->action('AdminController@listAll');
    }
    
    public function phpinfo(){
      return view('telas.phpinfo');
    }

    public function delete($id){

      $user = User::find($id);
      $professorId = $user->professor_matricula;
      $professor = Professor::find($professorId);
      $professor->deleted = 1;
      $professor->save();
      $user->access = 0;
      $user->save();

      return redirect()->action('AdminController@listAll');
    }

    public function add(){
      return view('telas.cadastrarUsuario');
    }

    public function added() {
      $params = Request::all();
      $professor = new Professor(
        array(
          'id' => $params['professor_matricula'],
          'name'=> $params['name'],
          'email' => $params['email'],
          'cpf' => $params['cpf']
        )
      );
      $professor->save();

      $userInfo = array();
      $userInfo['professor_matricula'] = $params['professor_matricula'];
      if (isset($params['admin'])) {
        $userInfo['admin'] = 1;
      }
      if (isset($params['access'])) {
        $userInfo['access'] = 1;
      }
      $user = new User($userInfo);
      $user->password = Hash::make($params['password']);
      $user->save();


      return redirect()->action('AdminController@listAll');
    }

    public function remove($id)
    {
        $user = User::find($id);
        if(empty($user)) {
          return "Esse avaliador não existe";
        }

        $professorId = $user->professor_matricula;
        $professor = Professor::find($professorId);


        $data = array(
          'user' => $user,
          'professor' => $professor,
        );
        return view('telas.removerAvaliador')->with('data', $data);
    }

    public function edit($id)
    {
      $user = User::find($id);
      $professorId = $user->professor_matricula;
      $professor = Professor::find($professorId);

      if(empty($professor)) {
        return "Esse Professor não existe";
      }

      $data = array(
          'user' => $user,
          'professor' => $professor,
        );
      return view('telas.editarAvaliador')->with('data', $data);
    }

    public function edited($id)
    {
      $params = Request::all();

      $user = User::find($id);
      $professorId = $user->professor_matricula;
      $professor = Professor::find($professorId);


      $professor->name = $params['nome'];
      $professor->email = $params['email'];
      $professor->save();

      return redirect()->action('AdminController@listAll') ->withInput(Request::only('nome'));
    }



}
