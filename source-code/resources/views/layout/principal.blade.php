<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <title>SABolsas</title>

    <!-- Bootstrap -->
  </head>

  <header>
    <nav class="navbar  navbar-inverse navbar-fixed-top" style="background-color:#000066">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" >SABolsas - PGCOMP</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="{{action('TesteController@list_a')}}"><span class="label label-default">Listagem</span></a></li>
          <li><a href="{{action('TesteController@cad_a')}}"><span class="label label-default">Cadastro Aluno</span></a></li>
        </ul>
    </nav>
</header>
<body>
    <div class = "container">
        @yield('content')
    </div>
</body>
