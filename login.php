<?php session_start(); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
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
		<section class="formulario">	
		
	<?php
include("config/conectar.php");

if(isset($_POST['submit'])) {
	$usuario = mysqli_real_escape_string($strcon, $_POST['usuario']);
	$senha = mysqli_real_escape_string($strcon, $_POST['senha']);
	
	if($usuario == "" || $senha == "") {
		echo "Nome de usuário ou senha vazios.<br>";
		echo "<a href='login.php'>Voltar</a>";
	}
	else {
		$result = mysqli_query($strcon, "SELECT * FROM login WHERE usuario='$usuario'")
					or die("Ocorreu um problema ao executar a consulta solicitada.");
		
		$linha = mysqli_fetch_assoc($result);
		
		if (password_verify($senha, $linha['senha'])) {
		
			if(is_array($linha) && !empty($linha)) {
				$usuarioLogado = $linha['usuario'];
				$_SESSION['aberta'] = $usuarioLogado;
				$_SESSION['nome'] = $linha['nome'];
				$_SESSION['id'] = $linha['id'];
			}
		}
		else {
			echo "Nome de usuário ou senha inválido.<br>";
			echo "<a href='login.php'>Voltar</a>";
		}
		
		if(isset($_SESSION['aberta'])) {
			header('Location: index.php');			
		}
	}
}
else {
?>


<section>
		
	<div>
	
		<form method="POST" action="">
            <h2>Área Restrita</h2>
            <label>Nome de Usuário</label>
            <input type="text" name="usuario" placeholder="usuario" required autofocus>
            <label>Senha</label>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit" name="submit" value="Entrar">Acessar</button>
        </form>
        
	</div>	
	
</section>

<?php
}
?>
		
	</section>
		
		
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