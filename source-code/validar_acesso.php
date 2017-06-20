<?php

	session_start();

	require_once('db.class.php');

	$matricula = $_POST['matricula'];
	$senha = md5($_POST['senha']);

  $sql = " SELECT * FROM usuarios WHERE matricula = '$matricula' AND senha = '$senha' ";
	//echo $sql;
  // testar acesso ao banco
  $objDB = new db();
	$link = $objDB->conecta_mysql();

  $resultado_id = mysqli_query($link, $sql);

	// matricula senha

  if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id);
		//var_dump($dados_usuario);
		if(isset($dados_usuario['matricula'])){

			$_SESSION['matricula'] = $dados_usuario['matricula'];
			$_SESSION['email'] = $dados_usuario['email'];

			header('Location: home.php');
		}else{
			//var_dump($dados_usuario);
			header('Location: index.php?erro=1');
		}
	} else {
		echo 'erro login';
	}

?>
