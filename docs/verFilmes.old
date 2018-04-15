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
<link href="../css/estilo.css" rel="stylesheet" type="text/css">
<link href="../css/estilo_formulario.css" rel="stylesheet" type="text/css">

<script defer src="../js/fontawesome/fontawesome-all.js"></script>
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
					
	<div id="submenu_container">

	<nav class="submenu">
		<ul>
			<li><a href="../index.php">Início</a></li>
			<li><a href="../adicionarFilme.php">Adicionar filme</a></li>
		</ul>
	</nav>	

</div>									
																				
						
	<?php
//Incluir o arquivo de conexão ao banco de dados:
include_once("conectar.php");

//buscar os dados em ordem descrescente (entrada mais recente primeiro)
$result = mysqli_query($strcon, "SELECT * FROM filmes ORDER BY id DESC");
?>

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