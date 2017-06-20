<?php
	session_start();
	if(isset($_SESSION['matricula'])){
		header('Location: index2.php');
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="../../favicon.ico">

   <!-- Bootstrap core CSS -->
   <link href="/css/bootstrap.min.css" rel="stylesheet">

   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   <link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <title>SABolsas</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#000066">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed">
          </button>
          <a class="navbar-brand" href="index.php" >SABolsas - PGCOMP</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" method="post" action="validar_acesso.php" id="formLogin" >
            <div class="form-group">
              <input placeholder="Matricula" id="campo_matricula" name="matricula" class="form-control" type="text" >
            </div>
            <div class="form-group">
              <input placeholder="Senha" class="form-control" id="campo_senha" name="senha" type="password">
            </div>
            <button type="submit" class="btn btn-success" style="background-color:#333333; border-color:#FFFFFF" >Acesso</button>
            <a class="btn btn-success" href="cadastro.php" role="button" style="background-color:#333333; ; border-color:#FFFFFF">Cadastro</a>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1 id="titulo">Sistema Avalição de Bolsas - PGCOMP</h1>

      </div>
      <div class="btn-group" role="group" aria-label="...">
          <a  href="bolsas.php"> <button type="button" class="btn btn-default">Bolsas</button> </a>
          <a  href="#"> <button type="button" class="btn btn-default">...</button> </a>
          <a  href="#"> <button type="button" class="btn btn-default">...</button> </a>
      </div>




    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
