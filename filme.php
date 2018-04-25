<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1">
<title>
	
<?php
		
		$titulo_aba = $_GET["pgtitulo"];
		
		echo "$titulo_aba";
	
	?>	
		

</title>

<script defer src="js/fontawesome/fontawesome-all.js"></script>

<link href="css/estilo_geral.css" rel="stylesheet" type="text/css">
<link href="css/estilo_filme.css" rel="stylesheet" type="text/css">
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css">

 <!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: https://www.jssor.com -->
    <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="flipgallery/settings.js"></script>
	<script type="text/javascript" src="flipgallery/flipgallery.min.js"></script>

</head>

<body onLoad="flipGallery()">
<main role="main">

<header>
    
  <?php
	
	include_once "menu.php";
	
	?>
                          
</header>	

<?php

require_once "config/conectar.php";

//Agora é realizar a querie de busca no banco de dados	
	
	
$filme = $_GET["filme"];	
	
$sql = "SELECT * FROM filmes WHERE id = $filme";	
	
$resultado = mysqli_query($strcon, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");
	
while ($linha=mysqli_fetch_array($resultado)) {
	
$titulo = $linha["nome"];
$titoriginal = $linha["nomeOriginal"];
$poster = $linha["poster"];	
$estreia = $linha["estreia"];
$elenco = $linha["elenco"];	
$sinopse = $linha["sinopse"];
$diretor = $linha["diretor"];
$duracao = $linha["duracao"];
$genero = $linha["genero"];
$pais = $linha["paisOrigem"];
$imgFundo = $linha["imgFundo"];

	
echo "<section id='filme_topo_container' style='background-image: url(img/posters/backgrounds/$imgFundo); background-repeat: no-repeat; background-size: 100%;'>
	
	<div id='filme_info'>
		
		<div id='poster_filme'>
		
			<img src='img/posters/$poster'>
		
		</div>
		
		<div id='info'>
			
			<h1>$titulo</h1>
			<h2>$titoriginal</h2>
			
			<h3>Lançamento </h3>
			<p>$estreia</p>
			
			<h3>Direção </h3>
			<p>$diretor</p>
			
			<h3>Elenco </h3>
			<p>$elenco</p>
			
			<h3>Sinopse</h3><br>
			<p class='sinopse'>$sinopse</p>
			
			<ol>
				<li><h4>Gênero</h4>$genero</li>
				<li><h4>Duração</h4>$duracao</li>
				<li><h4>País</h4>$pais</li>
			</ol>
			
		</div>
		
	</div>
	
</section>";	
}
?>

<?php
	
$pgtitulo = $_GET["pgtitulo"];

?>	
	<div id='mapasite'>
		<?php
		echo "<a href='index.php'>Home </a>| ";
		echo "<a href='lancamentos_index.php'>Lançamentos </a>| ";
		echo "<a href='#'>$titulo_aba</a>";
		?>	
	</div>

	


<div id="corpo_filme">

	<!--INICIO SECTION COM AS DIVS DE LISTA DE NOTICIAS DO FILME-->
<section id="noticias_container">


	<h2>Mais sobre <?php echo "$titulo_aba";
		?></h2>

	<div class="lista_noticias">
		
		
<?php          
           include "config/conectar.php";

//Agora é realizar a querie de busca no banco de dados

$noticia = $_GET['filme'];		
		
		
$sql = "SELECT * FROM noticias WHERE relacionado = $noticia ORDER BY 
id DESC LIMIT 10";


$resultado = mysqli_query($strcon, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");

// Agora iremos "pegar" cada campo da notícia
// e organizar no HTML

while ($linha=mysqli_fetch_array($resultado)) {

$id = $linha["id"];
$titulo = $linha["titulo"];
$subtitulo = $linha["subtitulo"];
$data = $linha["data"];
$hora = $linha["hora"];
$img = $linha["img"];
$idautor = $linha["autor"];
$relacionado = $linha["relacionado"];
          
	
//AQUI É CAPTURADO O NOME DO AUTOR ATRAVÉS DO IDAUTOR:	
$sql2 = "SELECT * FROM login WHERE id='$idautor'";
	
$nomeautor = mysqli_query($strcon, $sql2)
or die ("Não foi possível realizar a consulta nome do autor!");
	
while ($linha2=mysqli_fetch_array($nomeautor)) {	
	$autor = $linha2["nome"];
}	
	

	
	
		echo "<div class='noticia'>

			<img src='img/noticias/$img' alt=''>
			<div class='info_noticia'>

				<div><i class='fas fa-calendar-alt'></i> $data</div>
				<div><i class='fas fa-clock'></i> $hora</div>
				<div><i class='fas fa-user'></i> $autor</div>
				<div><i class='fas fa-comment'></i> <a href='noticia.php?news=$id&pgtitulo=$titulo#disqus_thread'></a></div>
				

			</div>


			<div class='chamada_noticia'>
				<div><h1>$titulo</h1></div>
				<div><h2>$subtitulo</h2></div>
				<a href='noticia.php?news=$id&pgtitulo=$titulo&rel=$relacionado'><i class='fas fa-arrow-circle-right'></i> Continuar lendo</a>
			</div>


		</div>";

}
  ?>				

	</div>




</section>
	
<!--INICIO SECTION COM AS DIVS DE FILMES-->
<section id="filmes_relacionados_container">

	<h2>Galeria de imagens</h2>

	<div class="cartaz_container">


	</div>
	
	
	<p><a href="lancamentos_index.php"><i class="fas fa-list-alt"></i> TODOS</a></p>



	<h2>Você pode gostar</h2>

	<div class="relacionados_container">

			<?php

				

				//conectar ao banco de dados
				include 'config/conectar.php';


				//Agora é realizar a querie de busca no banco de dados

				$sql = "SELECT * FROM filmes WHERE genero ='$genero' AND id !=$noticia ORDER BY 
				id DESC LIMIT 8";

				$resultado = mysqli_query($strcon, $sql)
				or die ("Não foi possível realizar a consulta ao banco de dados");

				while ($linha=mysqli_fetch_array($resultado)) {

				$idFilmeRelacionado= $linha["id"];	
				$posterRelacionado = $linha["poster"];
				$tituloRelacionado = $linha["nome"];
			
					
				echo "<figure>
  				
					<a class='poster' href='filme.php?pgtitulo=$tituloRelacionado&filme=$idFilmeRelacionado'>
						<img src='img/posters/$posterRelacionado' alt='$tituloRelacionado'>
					</a>

				</figure>"; 	
					
					
					
					
					
				}
		?>


		</div>

		<p><a href="lancamentos_index.php"><i class="fas fa-list-alt"></i> TODOS</a></p>

</section>


	
</div>


</div>

<footer>

	<?php
		require_once "footer.php";
	?>

</footer>


</main>

<script id="dsq-count-scr" src="//cineontherocks.disqus.com/count.js" async></script>
</body>
</html>