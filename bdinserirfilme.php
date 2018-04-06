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
						
	<section>
	<?php
//Inclui o arquivo de conexao ao banco de dados
include_once("conectar.php");

if(isset($_POST['submit'])){
	$nome = $_POST["nome"];
$nomeOriginal = $_POST["nomeOriginal"];
$estreia = $_POST["estreia"];
$duracao = $_POST["duracao"];
$genero = $_POST["genero"];
$paisOrigem = $_POST["paisOrigem"];
$direcao = $_POST["diretor"];
$elenco = $_POST["elenco"];
$sinopse = $_POST["sinopse"];
$imgPoster = $_POST["poster"];
$cartaz = $_POST["emCartaz"]; 
	
	if (empty($nome) ||  empty($nomeOriginal) ||  empty($estreia) || empty($duracao) ||  empty($paisOrigem) ||  empty($direcao) ||  empty($elenco) || empty($sinopse) ||  empty($imgPoster) ||  empty($cartaz)){
		
		if(empty($nome)){
			echo "<strong>Campo Nome está vazio.</strong><br>";
		}
		if(empty($nomeOriginal)){
			echo "<strong>Campo Quantidade está vazio.</strong><br>";
		}
		
		if(empty($estreia)){
			echo "<strong>Campo Preço está vazio.</strong><br>";
		}
		
		if(empty($duracao)){
			echo "<strong>Campo Nome está vazio.</strong><br>";
		}
		
		if(empty($paisOrigem)){
			echo "<strong>Campo Preço está vazio.</strong><br>";
		}
		
		if(empty($direcao)){
			echo "<strong>Campo Nome está vazio.</strong><br>";
		}
		if(empty($elenco)){
			echo "<strong>Campo Quantidade está vazio.</strong><br>";
		}
		
		if(empty($sinopse)){
			echo "<strong>Campo Preço está vazio.</strong><br>";
		}
		
		if(empty($imgPoster)){
			echo "<strong>Campo Nome está vazio.</strong><br>";
		}
		if(empty($cartaz)){
			echo "<strong>Campo Quantidade está vazio.</strong><br>";
		}
		
		
		//link para a pagina anterior
		echo "<br><a href='javascript:self.history.back();'>Voltar</a>";

	}else{
		//Se todos os campos estiverem preenchidos (não-vazios)
		//Inserir os dados no banco de dados
		$result = mysqli_query($strcon, "INSERT INTO filmes (nome, nomeOriginal, estreia, duracao, genero, paisOrigem, diretor, elenco, sinopse, poster, emCartaz) VALUES ('$nome', '$nomeOriginal', '$estreia', '$duracao', '$genero', '$paisOrigem', '$direcao', '$elenco', '$sinopse', '$imgPoster', '$cartaz')");
		

		echo "'$resultGenero'";
		
		//Mostrar mensagem de sucesso na operação
		echo "<strong>Item adicionado com sucesso!</strong><br>";
		echo "<br><a href='verFilmes.php'>Visualizar Produtos</a>";
	
	}
	
}
	
?>
	
</section>
		
</div>	
	
<footer>
	<p>2018 Todos os direitos reservados</p>
</footer>
</main>
</body>
</html>