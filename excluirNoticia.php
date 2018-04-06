<?php session_start();  ?>

<?php
if(!isset($_SESSION['aberta'])){
	header('Location: login.php');
	
}
?>

<?php
//Iniciar o arquivo de conexao ao banco de dados
include("config/conectar.php");

//obter o id dos dados a partir da URL
$id = $_GET['id'];

//excluir a linha da tabela
$result=mysqli_query($strcon, "DELETE FROM noticias WHERE id=$id");

//Redericionar para a pagina de visualização -> ver.php
header("Location:verNoticias.php");



	


?>