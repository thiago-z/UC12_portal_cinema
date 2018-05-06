<?php session_start();

if(!isset($_SESSION['aberta'])) {
	header('Location: login.php');
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Visualizar Notícias</title>
	<meta name="viewport" content="initial-scale=1">
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/estilo_formulario_consulta.css" rel="stylesheet" type="text/css">

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
						
	<?php
//Incluir o arquivo de conexão ao banco de dados:
include_once("config/conectar.php");

//buscar os dados em ordem descrescente (entrada mais recente primeiro)
$result = mysqli_query($strcon, "SELECT * FROM noticias ORDER BY id DESC");
?>
	

<nav class="submenu">
	
	<ul>
		
		<li><a href="verNoticias.php">Voltar</a></li>
		<li><a href="adicionarNoticia.php">Adicionar notícia/artigo</a></li>
		
	</ul>
	
</nav>


	<br><br>
	<h3>Lista de notícias e artigos cadastrados</h3>
	
	
	<div id='barra_filtro'>
		
		<li><a href='verNoticias.php?ordem=DESC'><i class='fas fa-sort-alpha-up'></i></a></li>
		
		<li><a href='verNoticias.php?ordem=ASC'><i class='fas fa-sort-alpha-down'></i></a></li>
		
	</div>
	
	<?php
	//Incluir o arquivo de conexão ao banco de dados:
	include_once("config/conectar.php");
	
	$ordem = $_GET["ordem"];

	
	//buscar os dados em ordem descrescente (entrada mais recente primeiro)
	$result = mysqli_query($strcon, "SELECT * FROM noticias ORDER BY titulo $ordem");
	
	while($linha = mysqli_fetch_array($result)) {
	
	$id = $linha["id"];
	$titulo = $linha["titulo"];
	$subtitulo = $linha["subtitulo"];
	$texto = $linha["texto"];	
	$imgnoticia = $linha["img"];
	$verSite = $linha["validar"];
		

	
echo "<div class='lista_filmes_container'>
	
	
	
	<div class='imgposter'>
		<img src='../UC12_site_cinema/img/noticias/$imgnoticia' alt='$titulo'>
	</div>
	
	<div class='lista_filmes'>
	
		<div><h1>$titulo</h1></div>
		<div><h2>$subtitulo</h2></div>
		<div>$texto</div>
		
		
	</div>
	
	<div class='gerenciar_filmes'>
	
		<div><a href='editarNoticia.php?id=$id'><i class='fas fa-edit'></i><br>Editar</a></div>";
		
	
	//MOSTRAR DESVALIDAR
		
		if ($verSite == "off"){
			
			echo"<div><a href='verNoticias.php?id=$id&validar=$id'><i class='fas fa-check-square'></i><br>Validar</a></div>";
		}
		else {
			echo "<div><a href='verNoticias.php?id=$id&desvalidar=$id'><i class='fas fa-ban'></i><br>Desvalidar</a></div>";}
	
		
		echo "<div><a href='excluirNoticia.php?id=$id'><i class='fas fa-trash-alt'></i><br>Excluir</a></div>
		
	</div>
	
</div>";

		
//VALIDAR e DESVALIDAR NOTÍCIA		
$validar = $_GET["validar"];
$desvalidar = $_GET["desvalidar"];
		
$validador = mysqli_query($strcon, "UPDATE noticias SET validar='on' WHERE id='$validar'");	

$desvalidador = mysqli_query($strcon, "UPDATE noticias SET validar='off' WHERE id='$desvalidar'");			
		
	}
?>
	
	
		
	
</div>
	
<footer>
	<p>2018 Todos os direitos reservados</p>
</footer>
</main>
</body>
</html>