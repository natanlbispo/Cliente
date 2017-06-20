<?php
	class db{
		//host
		private $host = 'localhost';
		//usuario
		private $usuario = 'root';
		//senha
		private $senha = '1234';
		//bando de dados
		private $database = 'db_teste';

		public function conecta_mysql(){
			$conexao = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
			//ajustar o charset de comunicação entre a aplicação e o banco de dados
			mysqli_set_charset($conexao,'utf8');
			// verificar erro conexão
			if(mysqli_connect_errno()){
				echo 'houve erro conexao'.mysqli_connect_error();
			}
			return $conexao;
		}

	}
?>
