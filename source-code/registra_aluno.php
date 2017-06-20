<?php

  require_once ('db.class.php');

  $nome = $_POST['nome'];
	$matricula = $_POST['matricula'];
	$nota = $_POST['nota'];
  $orientador = $_POST['orientador'];
  $data_entrada = $_POST['dataEntrada'];
  //echo 'teste';
	//echo $_POST['matricula'];

  $objDB = new db();
	$link = $objDB->conecta_mysql();

  $matricula_existe = false;

  $sql = "select * from alunos where matricula = '$matricula' ";

  if($resultado_id = mysqli_query($link, $sql)){

    $dados_usuario = mysqli_fetch_array($resultado_id);
    if(isset($dados_usuario['matricula'])){
      $matricula_existe = true;
    }
    }else{
      echo "erro";
    }

    if ($matricula_existe){
      $retorno_get= '';
      $retorno_get.="erro_matricula=1&";
      header('Location: cadastro.php?'.$retorno_get);
  		die();
    }

    $sql = "insert into alunos(nome, matricula, nota, orientador, data_entrada) values ('$nome','$matricula','$nota', '$orientador', '$data_entrada')";
  	//executar a query
    $retorno_get= '';
  	if(mysqli_query($link, $sql)){
  		echo "usuario regitrado";
      $retorno_get.="cad_feito=1&";
  	}else{
      $retorno_get="cad_erro=1&";
  	}

    header('Location: cad_aluno.php?'.$retorno_get);
 ?>
