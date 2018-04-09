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
<link href="css/estilo_formulario.css" rel="stylesheet" type="text/css">
</head>

<body>
<main role="main">
<header id="login">
	
	<div id="portal_id">
	
	<!--PARTE SUPERIOR COM LOGON E MENU MOVIDO PARA ARQUIVO SEPARADO-->
	<?php
		
		include('config/logon_menu.php');
		
	?>
		
		
	</div>
		
</header>
<div id="pginicial">						
						
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

<section>
	<br><br>
	<h3>Lista de notícias e artigos cadastrados</h3>
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<th>Título</th>
			<th>Data</th>
			<th>Hora</th>
			<th>Autor</th>
			<th>Destaque?</th>
			<th>Alterar/Excluir</th>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['titulo']."</td>";
			echo "<td>".$res['data']."</td>";
			echo "<td>".$res['hora']."</td>";
			echo "<td>".$res['autor']."</td>";
			echo "<td>".$res['destaque']."</td>";
			echo "<td><a href=\"editar.php?id=$res[id]\">Editar</a> | <a href=\"excluirNoticia.php?id=$res[id]\" onClick=\"return confirm('Tem certeza de que você deseja excluir?')\">Excluir</a></td>";		
		}
		?>
	</table>	
</section>
	
</div>	
	
<footer>
	<p>2018 Todos os direitos reservados</p>
</footer>
</main>
</body>
</html>