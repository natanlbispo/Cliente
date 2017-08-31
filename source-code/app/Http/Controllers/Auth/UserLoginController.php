<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Professor;
use Auth;

class UserLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
      return view('auth.user-login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'matricula' => 'required|min:9',
        'password' => 'required|min:6'
      ]);

      // Attempt to log the user in
      if (Auth::guard('web')->attempt(['professor_matricula' => $request->matricula, 'password' => $request->password], $request->remember)) {
        $user = Auth::guard('web')->user();

        if ($user->access == 1) {
          // Primeiro acesso
          // $professor = $this->getProfessor($user->professor_matricula);
          // if (intval($prfessor->cpf) == 0) {
          //   return view('telas.primeiroAcesso')->with('data', $professor);
          // }

          if ($user->admin == 1) {
            return redirect()->intended(route('admin.dashboard'));
          }
          else {
            return redirect()->intended(route('user.dashboard'));
          }
        } else {
          return redirect()->back()->withInput($request->only('professor_matricula', 'remember'));
        }
      }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('professor_matricula', 'remember'));
    }

    public function logout()
    {
        Auth::guard('user')->logout();

        return redirect('/');
    }

    private function getProfessor($id) {
      $professor = Professor::find($id);
      return $professor;
    }
}
