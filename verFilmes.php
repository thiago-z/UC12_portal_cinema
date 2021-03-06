﻿<?php session_start();

if(!isset($_SESSION['aberta'])) {
	header('Location: login.php');
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Visualizar Filmes</title>
	<meta name="viewport" content="initial-scale=1">
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/estilo_formulario_consulta.css" rel="stylesheet" type="text/css">

<script defer src="js/fontawesome/fontawesome-all.js"></script>

</head>

<body>
<main role="main">
<header id="login">
	
	
		
		<!--PARTE SUPERIOR COM LOGON E MENU MOVIDO PARA ARQUIVO SEPARADO-->
	<?php
		
		include('logon_menu.php');
		
	?>
		
	
		
</header>

<div id="pg_filme_consulta">						
	
<nav class="submenu">
	
	<ul>
		
		<li><a href="index.php">Voltar para Home</a></li>
		
		<li><a href="adicionarFilme.php">Adicionar filme</a></li>
		
		<li><a href="adicionarGenero.php">Adicionar gênero</a></li>
		
	</ul>
	
</nav>	

	<br><br>

	<h3>Lista de filmes cadastrados</h3>
	
	<div id='barra_filtro'>
		
		<li><a href='verFilmes.php?ordem=DESC'><i class='fas fa-sort-alpha-up'></i></a></li>
		
		<li><a href='verFilmes.php?ordem=ASC'><i class='fas fa-sort-alpha-down'></i></a></li>
		
		
		
	
		
	</div>
	
<?php
	//Incluir o arquivo de conexão ao banco de dados:
	include_once("config/conectar.php");
	
	$ordem = $_GET["ordem"];
	
	//buscar os dados em ordem descrescente (entrada mais recente primeiro)
	$result = mysqli_query($strcon, "SELECT * FROM filmes ORDER BY nome $ordem");
	
	while($linha = mysqli_fetch_array($result)) {
	
	$id = $linha["id"];
	$tituloBR = $linha["nome"];
	$tituloOriginal = $linha["nomeOriginal"];
	$estreia = $linha["estreia"];	
	$poster = $linha["poster"];
	$emCartaz = $linha["emCartaz"];
	$duracao = $linha["duracao"];	
				

	
	
echo "<div class='lista_filmes_container'>
	
	
	
	<div class='imgposter'>
		<img src='../UC12_site_cinema/img/posters/$poster' alt='$tituloBR'>
	</div>
	
	<div class='lista_filmes'>
	
		<div><h1>$tituloBR</h1></div>
		<div><h2>$tituloOriginal</h2></div>
		<div>$estreia</div>
		<div>Duração: <b>$duracao</b>min</div>
		<div>Em cartaz: <b>$emCartaz</b></div>
		
	</div>
	
	<div class='gerenciar_filmes'>
	
		<div><a href='editarFilme.php?id=$id'><i class='fas fa-edit'></i><br>Editar</a></div>
		
		<div><a href='excluirFilme.php?id=$id'><i class='fas fa-trash-alt'></i><br>Excluir</a></div>
		
	</div>
	
</div>";
			
			
}
?>		

</div>	
	
<footer>
	<p>2018 Todos os direitos reservados</p>
</footer>
</main>
</body>
</html>