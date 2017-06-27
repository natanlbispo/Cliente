<?php
	session_start();
	if(!isset($_SESSION['matricula'])){
		header('Location: index.php?erro=1');
	}

	$cabecalho_title = "SABolsas";
	include("header.php");

  $erro_matricula = isset($_GET['erro_matricula']) ? $_GET['erro_matricula'] : 0;
  $cad_erro = isset($_GET['cad_erro']) ? $_GET['cad_erro'] : 0;
  $cad_feito = isset($_GET['cad_feito']) ? $_GET['cad_feito'] : 0;
 ?>
    	    <div class="container">

    	    	<br /><br />

    	    	<div class="col-md-4"></div>
    	    	<div class="col-md-4">
    	    		<h3>CADASTRO Avaliadores</h3>

              <?php
                if($cad_erro){
                  echo '<font style ="color:#FF0000"> Erro Cadastro!</font>';
                }
                if($cad_feito){
                  echo '<font style ="color:#000FF"> Cadastro Realizado com sucesso! </font>';
                }
              ?>
              <br />

    				<form method="post" action="registra_matr.php" id="formCadastrarse">

              <div class="form-group">
    						<input type="text" class="form-control" id="matricula" name="matricula" placeholder="Matricula" required="requiored" pattern="[0-9]+$" >
    						<?php
    							if($erro_matricula){
    								echo '<font style ="color:#FF0000"> Matricula ja cadastrada! </font>';
    							}
    						?>
    					</div>

							<div class="form-group">
								<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Avaliador" required="requiored" >
								?>
							</div>

      				<button type="submit" class="btn btn-primary form-control">Cadastrar</button>
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
