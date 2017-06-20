<?php
	session_start();
	if(!isset($_SESSION['matricula'])){
		header('Location: index.php?erro=1');
	}

	$cabecalho_title = "SABolsas";
	include("header.php");
?>
