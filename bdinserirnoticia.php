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

<?php

//Data e horo devidamente configurados	
$data = date("Y-m-d");
$hora = date("H:i:s");
$novadata = substr($data,8,2) . "/" .substr($data,5,2) . 
"/" . substr($data,0,4);
$novahora = substr($hora,0,2) . "h" .substr($hora,3,2) . 
"min"; 
?>

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
include_once("config/conectar.php");

if(isset($_POST['submit'])){
	$tipo = $_POST["tipo"];
	$titulo = $_POST["titulo"];
	$subtitulo = $_POST["subtitulo"];
	$texto = $_POST["texto"];
	$novadata = $_POST["data"];
	$novahora = $_POST["hora"];
	$autor = $_GET["autor"]; //VEM PELA URL E NÃO PELO FORM
	$relacionado = $_POST["relacionado"];
	$img = $_POST["img"];
	$destaque = $_POST["destaque"];
	$imgDestaque = $_POST["imgDestaque"];
	
	if (empty($tipo) ||  empty($titulo) ||  empty($subtitulo) || empty($texto) ||  empty($novadata) ||  empty($novahora) ||  empty($autor) ||  empty($relacionado) || empty($img) ||  empty($destaque)){
		
		if(empty($tipo)){
			echo "<strong>Campo Nome está vazio1.</strong><br>";
		}
		if(empty($titulo)){
			echo "<strong>Campo Quantidade está vazio.</strong><br>";
		}
		
		if(empty($subtitulo)){
			echo "<strong>Campo Preço está vazio.</strong><br>";
		}
		
		if(empty($texto)){
			echo "<strong>Campo Nome está vazio2.</strong><br>";
		}
		if(empty($novadata)){
			echo "<strong>Campo Quantidade está vazio.</strong><br>";
		}
		
		if(empty($novahora)){
			echo "<strong>Campo Preço está vazio.</strong><br>";
		}
		
		if(empty($autor)){
			echo "<strong>Campo Nome está vazio.3</strong><br>";
		}
		if(empty($relacionado)){
			echo "<strong>Campo Quantidade está vazio.</strong><br>";
		}
		
		if(empty($img)){
			echo "<strong>Campo Preço está vazio.</strong><br>";
		}
		
		if(empty($destaque)){
			echo "<strong>Campo Nome está vazio.</strong><br>";
		}
		
		
		//link para a pagina anterior
		echo "<br><a href='javascript:self.history.back();'>Voltar</a>";

	}else{
		//Se todos os campos estiverem preenchidos (não-vazios)
		//Inserir os dados no banco de dados
		$result = mysqli_query($strcon, "INSERT INTO noticias (tipo, titulo, subtitulo, texto, data, hora, autor, relacionado, img, destaque, imgDestaque) VALUES ('$tipo', '$titulo', '$subtitulo', '$texto',  '$novadata', '$novahora', '$autor', '$relacionado', '$img', '$destaque', '$imgDestaque')");
		
		
		//Mostrar mensagem de sucesso na operação
		
		echo "$texto";
		
		echo "<strong>Notícia ou artigo adicionados com sucesso!</strong><br>";
		echo "<br><a href='verNoticias.php'>Visualizar adicionados</a>";
	
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