<?php session_start(); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Portal de cadastro</title>
	<meta name="viewport" content="initial-scale=1">
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/estilo_formulario.css" rel="stylesheet" type="text/css">
<script defer src="js/fontawesome/fontawesome-all.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<main role="main">
<header id="login">
	
	<div id="portal_id">
	
		
		<!--PARTE SUPERIOR COM LOGON E MENU MOVIDO PARA ARQUIVO SEPARADO-->
	<?php
		
		include('logon_menu.php');
		
	?>
		
	</div>
		
</header>
<div id="pginicial">
											
	<section>
		
		<p>Bem vendo ao Portal Administrativo do site "Nome do site"!</p>
		<br><br>
		<p>Aqui você pode gerenciar todo o conteúdo que fica visível no site, assim como adicionar novas notícias ou artigos para o site.</p>
		<br><br>
		<p>Você também deve adicionar novos filmes no banco de dados para relacionar com as noticias postadas no site.</p>
		
	</section>					
	
</div>	
	
<footer>
	<p>2018 Todos os direitos reservados</p>
</footer>
</main>
</body>
</html>