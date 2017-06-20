<?php

  require_once ('db.class.php');

  $nome = $_POST['nome'];
  $matricula = $_POST['matricula'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);
  //echo 'teste';
	//echo $_POST['matricula'];

  $objDB = new db();
	$link = $objDB->conecta_mysql();

  $matricula_existe = false;
	$email_existe = false;

  $sql = "select * from usuarios where matricula = '$matricula' ";
  $sql2 = "select * from matraprov where matriculap = '$matricula' ";

  if($resultado_id = mysqli_query($link, $sql2)){
    $dados_usuario = mysqli_fetch_array($resultado_id);
    if(isset($dados_usuario['matriculap'])){
    }else{
      $retorno_get.="erro_matcad=1&";
      header('Location: cadastro.php?'.$retorno_get);
      die();
    }
    }


  if($resultado_id = mysqli_query($link, $sql)){

    $dados_usuario = mysqli_fetch_array($resultado_id);
    if(isset($dados_usuario['matricula'])){
      $matricula_existe = true;
    }
    }else{
      echo "erro";
    }

    $sql = "select * from usuarios where email = '$email' ";
  	if($resultado_id = mysqli_query($link, $sql)){

  		$dados_usuario = mysqli_fetch_array($resultado_id);
  		if(isset($dados_usuario['email'])){
  		$email_existe = true;
  		}
  	}else{
  		echo 'erro';
  	}

    if ($matricula_existe || $email_existe){
      $retorno_get= '';
      if($matricula_existe){
        $retorno_get.="erro_matricula=1&";
      }
      if($email_existe){
  			$retorno_get.="erro_email=1&";
  		}
      header('Location: cadastro.php?'.$retorno_get);
  		die();
    }

    $sql = "insert into usuarios(nome, matricula, email, senha) values ('$nome','$matricula','$email','$senha')";
  	//executar a query
    $retorno_get= '';
  	if(mysqli_query($link, $sql)){
  		echo "usuario regitrado";
      $retorno_get.="cad_feito=1&";
  	}else{
      $retorno_get="cad_erro=1&";
  	}

    header('Location: cadastro.php?'.$retorno_get);
 ?>
