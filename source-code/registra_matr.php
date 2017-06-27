<?php

  require_once ('db.class.php');


	$matricula = $_POST['matricula'];
  $nome = $_POST['nome'];
  //echo 'teste';
	//echo $_POST['matricula'];

  $objDB = new db();
	$link = $objDB->conecta_mysql();

  $matricula_existe = false;

  $sql = "select * from matraprov where matriculap = '$matricula' ";

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

    $sql = "insert into matraprov(matriculap, nome  ) values ('$matricula', '$nome')";
  	//executar a query
    $retorno_get= '';
  	if(mysqli_query($link, $sql)){
  		echo "usuario regitrado";
      $retorno_get.="cad_feito=1&";
  	}else{
      $retorno_get="cad_erro=1&";
  	}

    header('Location: cad_aprov.php?'.$retorno_get);
 ?>
