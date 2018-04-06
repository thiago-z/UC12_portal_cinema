<?php session_start(); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Portal de cadastro</title>
	<meta name="viewport" content="initial-scale=1">
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/estilo_formulario.css" rel="stylesheet" type="text/css">
</head>

<body>
<main role="main">
<header id="login">
	
	<div id="portal_id">
		<p>Sistema de cadastro</p>
		<br>
		<br>
			<?php
	if(isset($_SESSION['aberta'])) {	// Verifica se usuário já está logado			
		include("config/conectar.php");					
		echo "Bem-vindo " . $_SESSION['nome'] . "!";
		include("menu.php");	
	}
	else { // Se não estiver logado, pede para logar ou cadastrar usuário
		echo "Efetue login abaixo para cadastrar conteúdo no site<br>";
		echo "<a href='login.php' class='button'>Login</a><br><br>";
		echo "Ou então cadastre-se no sistema:<br>";
		echo "<a href='registrar.php' class='button'>Cadastrar-se</a>";
	}
	?>
		
		
	</div>
		
</header>
<div id="pginicial">						
						
	
	
	
</div>	
	
<footer>
	<p>2018 Todos os direitos reservados</p>
</footer>
</main>
</body>
</html>