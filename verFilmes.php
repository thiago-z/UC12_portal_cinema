<?php session_start();

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
						
	<?php
//Incluir o arquivo de conexão ao banco de dados:
include_once("config/conectar.php");

//buscar os dados em ordem descrescente (entrada mais recente primeiro)
$result = mysqli_query($strcon, "SELECT * FROM filmes ORDER BY id DESC");
?>
	
<a href="index.php">Início</a> | 
	<a href="adicionarFilme.php">Adicionar filme</a> | 
	<a href="logout.php">Logout</a>
	<br><br>
	<h3>Lista de filmes cadastrados</h3>
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<th>Filme</th>
			<th>Estréia</th>
			<th>Poster</th>
			<th>Em cartaz?</th>
			<th>Alterar/Excluir</th>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['nome']."</td>";
			echo "<td>".$res['estreia']."</td>";
			echo "<td>".$res['poster']."</td>";
			echo "<td>".$res['emCartaz']."</td>";	
			echo "<td><a href=\"editarFilme.php?id=$res[id]\">Editar</a> | <a href=\"excluirFilme.php?id=$res[id]\" onClick=\"return confirm('Tem certeza de que você deseja excluir?')\">Excluir</a></td>";		
		}
		?>
	</table>	
	
</div>	
	
<footer>
	<p>2018 Todos os direitos reservados</p>
</footer>
</main>
</body>
</html>