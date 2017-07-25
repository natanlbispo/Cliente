<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/app.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
</head>
	<nav class="navbar navbar-light bg-faded colorPalets" >
		<div class="container-fluid">
			@if (Route::has('login'))
				<div class="navbar-header">
					  @if (Auth::check())
      			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        			<span class="sr-only">Toggle navigation</span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
      			</button>
      			<a class="navbar-brand navTitle" href="/">SigPPG</a>
    		</div>
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
              <li><a href="/lalunos" class="navText">Listar Alunos</a></li>
						</ul>

						@else
						<ul class="nav navbar-nav navbar-right">
              <button type="button" class="btn btn-primary navButton" id="myBtn">Logar</button>

              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Login</h4>
                    </div>
										<div class="modal-body">
											<form class="form-horizontal" method="POST" action="{{ route('login') }}">
	                        {{ csrf_field() }}

	                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

	                            <div class="col-md-6">
	                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

	                                @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                            <label for="password" class="col-md-4 control-label">Password</label>

	                            <div class="col-md-6">
	                                <input id="password" type="password" class="form-control" name="password" required>

	                                @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <div class="col-md-6 col-md-offset-4">
	                                <div class="checkbox">
	                                    <label>
	                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
	                                    </label>
	                                </div>
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <div class="col-md-8 col-md-offset-4">
	                                <button type="submit" class="btn btn-primary">
	                                    Login
	                                </button>

	                                <a class="btn btn-link" href="{{ route('password.request') }}">
	                                    Forgot Your Password?
	                                </a>
	                            </div>
	                        </div>
	                    </form>
                    </div>
                  </div>
                </div>
              </div>
        			<button type="button" onClick="location.href='cadastro.html'" class="btn btn-primary navButton">Cadastrar-se</button>
      			</ul>
						@endif
    		</div>
  		</div>
			@endif
	</nav>
<body>
    <div class = "container">
        @yield('content')
    </div>
</body>
