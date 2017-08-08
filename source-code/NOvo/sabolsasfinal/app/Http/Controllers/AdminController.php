<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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

    public function delete($id){

      $user = User::find($id);
      $professorId = $user->professor_matricula;
      $professor = Professor::find($professorId);
      $professor->delete();
      $user->delete();

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
      $userInfo['password'] = bcrypt($params['password']);
      $user = new User($userInfo);
      $user->save();


      return redirect()->action('AdminController@listAll');
    }

}
