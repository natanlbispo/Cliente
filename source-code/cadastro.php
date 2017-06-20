<?php
  $erro_matricula = isset($_GET['erro_matricula']) ? $_GET['erro_matricula'] : 0;
	$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
  $cad_erro = isset($_GET['cad_erro']) ? $_GET['cad_erro'] : 0;
  $cad_feito = isset($_GET['cad_feito']) ? $_GET['cad_feito'] : 0;
  $erro_matcad = isset($_GET['erro_matcad']) ? $_GET['erro_matcad'] : 0;
 ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SABolsas</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#000066">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed">
          </button>
          <a class="navbar-brand" href="index.php" >SABolsas - PGCOMP</a>
        </div>
      </div>
    </nav>

    	    <div class="container">

    	    	<br /><br />

    	    	<div class="col-md-4"></div>
    	    	<div class="col-md-4">
    	    		<h3>CADASTRO</h3>
              <?php
                if($erro_matcad)
                  echo '<font style ="color:#FF0000"> Matricula sem autorizaçao!</font>';
                if($cad_erro){
                  echo '<font style ="color:#FF0000"> Erro Cadastro!</font>';
                }
                if($cad_feito){
                  echo '<font style ="color:#000FF"> Cadastro Realizado com sucesso! </font>';
                }
              ?>
    	    		<br />
    				<form method="post" action="registra_usuario.php" id="formCadastrarse">
    					<div class="form-group">

                <div class="form-group">
      						<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="requiored">
      					</div>

    						<input type="text" class="form-control" id="matricula" name="matricula" placeholder="Matricula" required="requiored" pattern="[0-9]+$" >
    						<?php
    							if($erro_matricula){
    								echo '<font style ="color:#FF0000"> Matricula ja cadastrada! </font>';
    							}
    						?>
    					</div>

    					<div class="form-group">
    						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">
    						<?php
    							if($erro_email){
    								echo '<font style ="color:#FF0000"> Email ja cadastrada!</font>';
    							}
    						?>
    					</div>

    					<div class="form-group">
    						<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored">
    					</div>

    					<button type="submit" class="btn btn-primary form-control">Inscreva-se</button>
    				</form>
    			</div>
    			<div class="col-md-4"></div>

    			<div class="clearfix"></div>
    			<br />
    			<div class="col-md-4"></div>
    			<div class="col-md-4"></div>
    			<div class="col-md-4"></div>

    		</div>


    	    </div>



    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>