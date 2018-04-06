<!--

CONEXÃO COM O BANCO DE DADOS

-->

<?php

$strcon = mysqli_connect("localhost", "root", "root", "portal_cinema_1");

if (!$strcon){
	die("Não foi possivel conectar ao servidor!");
}


?>