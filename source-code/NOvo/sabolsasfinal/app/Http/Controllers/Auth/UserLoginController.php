<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        'password' => 'required|min:6'
      ]);

      // Attempt to log the user in
      if (Auth::guard('web')->attempt(['professor_matricula' => $request->matricula, 'password' => $request->password], $request->remember)) {
        $user = Auth::guard('web')->user();
        if ($user->access == 1) {
          if ($user->admin == 1) {
            return redirect()->intended(route('admin.dashboard'));
          }
          else {
            return redirect()->intended(route('user.dashboard'));
          }
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
}
