<?php session_start();

if(!isset($_SESSION['aberta'])) {
	header('Location: login.php');
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Visualizar</title>
	<meta name="viewport" content="initial-scale=1">
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/estilo_formulario.css" rel="stylesheet" type="text/css">

<script defer src="js/fontawesome/fontawesome-all.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<main role="main">

<header id="login">
	
	
		
		<!--PARTE SUPERIOR COM LOGON E MENU MOVIDO PARA ARQUIVO SEPARADO-->
	<?php
		
		include('logon_menu.php');
		
	?>
		
	
		
</header>

<div id="pginicial">						
						
	<div id="pginicial">						
						
<section>
	
	
	<?php

//conectar ao banco de dados
include 'conectar.php';


//Vamos definir as variáveis de data e hora
//para inserção no banco de dados


//vamos criar uma variável especial para a querie sql	
$nome = $_POST["nomeGenero"];


$sql = "INSERT INTO generos (nomeGenero) VALUES ('$nome')";


mysqli_query($strcon,$sql) or die("Erro no cadastro");

mysqli_close($strcon);



//Substitua os valores acima caso não esteje de acordo com sua máquina
//Selecionando o banco de dados...

//

//Inserindo os dados


echo "<h1>Filme cadastrado com sucesso!</h1>";
echo "<br><br>";
echo "<p>Para cadastrar outro filme clique <a href='adicionarFilme.php'><b>aqui</b>.<a></p>";
?>
	
</section>
	
	
</div>	
	
<footer>
	<p>2018 Todos os direitos reservados</p>
</footer>
</main>
</body>
</html>