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
<link href="css/estilo_formulario_consulta.css" rel="stylesheet" type="text/css">

<script defer src="js/fontawesome/fontawesome-all.js"></script>

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
$result = mysqli_query($strcon, "SELECT * FROM filmes ORDER BY id DESC");
?>
	
<nav class="submenu">
	
	<ul>
		
		<li><a href="index.php">Voltar para Home</a></li>
		<li><a href="adicionarFilme.php">Adicionar filme</a></li>
		
	</ul>
	
</nav>	

	<br><br>
	
<!--	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<th>Filme</th>
			<th>Estréia</th>
			<th>Poster</th>
			<th>Em cartaz?</th>
			<th>Alterar/Excluir</th>
		</tr>-->
		<?php
	//	while($res = mysqli_fetch_array($result)) {		
//			echo "<tr>";
//			echo "<td>".$res['nome']."</td>";
//			echo "<td>".$res['estreia']."</td>";
//			echo "<td width='10%'><img src='../UC12_site_cinema/img/posters".$res['poster']."' width='100%' alt=".$res['nome']."></td>";
//			echo "<td>".$res['emCartaz']."</td>";	
//			echo "<td><a href=\"editarFilme.php?id=$res[id]\">Editar</a> | <a href=\"excluirFilme.php?id=$res[id]\" onClick=\"return confirm('Tem certeza de que você deseja excluir?')\">Excluir</a></td>";		
//		}
		?>
	<!--</table>-->
	
	
	<h3>Lista de filmes cadastrados</h3>
	
<div id="lista_filmes_container">
	
	
	
	<div class="imgposter">
		<img src="../UC12_site_cinema/img/posters/vingadores_guerra_infinita.jpg" alt="">
	</div>

	<!--<img src="../UC12_site_cinema/img/posters/jurassicworld2.jpg" alt="">-->
	
	<div class="lista_filmes">
	
		<div><h1>Título nacional</h1></div>
		<div><h2>Título original</h2></div>
		<div>Lançamento</div>
		<div>Em cartaz: </div>
		
	</div>
	
	<div class="gerenciar_filmes">
	
		<div><a href=""><i class="fas fa-edit"></i><br>Editar</a></div>
		<div><a href=""><i class="fas fa-trash-alt"></i><br>Excluir</a></div>
		
	</div>
	
</div>
	
	
</div>	
	
<footer>
	<p>2018 Todos os direitos reservados</p>
</footer>
</main>
</body>
</html>