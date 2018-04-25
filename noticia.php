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
<link href="css/estilo_noticia_individual.css" rel="stylesheet" type="text/css">
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css">

 <!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: https://www.jssor.com -->
    <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
    <script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:-1,d:1,o:-0.7}],
              [{b:900,d:2000,x:-379,e:{x:7}}],
              [{b:900,d:2000,x:-379,e:{x:7}}],
              [{b:-1,d:1,o:-1,sX:2,sY:2},{b:0,d:900,x:-171,y:-341,o:1,sX:-2,sY:-2,e:{x:3,y:3,sX:3,sY:3}},{b:900,d:1600,x:-283,o:-1,e:{x:16}}]
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 3000;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>

</head>

<body>
<main role="main">
	
	<header>
    
  <?php
	
	require_once "menu.php";
	
	?>
                          
</header>
	
<div id="noticia_topo">

	
<?php          
require_once "config/conectar.php";

//Agora é realizar a querie de busca no banco de dados

$noticia = $_GET['news'];	
	
$sql = "SELECT * FROM noticias WHERE id='$noticia'";
	
$resultado = mysqli_query($strcon, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");
	
	
// Agora iremos "pegar" cada campo da notícia
// e organizar no HTML

while ($linha=mysqli_fetch_array($resultado)) {

$titulo = $linha["titulo"];
$subtitulo = $linha["subtitulo"];
$data = $linha["data"];
$hora = $linha["hora"];
$img = $linha["img"];
$idautor = $linha["autor"];

	
	
//AQUI É CAPTURADO O NOME DO AUTOR ATRAVÉS DO IDAUTOR:	
$sql2 = "SELECT * FROM login WHERE id='$idautor'";
	
$nomeautor = mysqli_query($strcon, $sql2)
or die ("Não foi possível realizar a consulta nome do autor!");
	
while ($linha2=mysqli_fetch_array($nomeautor)) {	
	$autor = $linha2["nome"];
}
	
	
	echo "<img src='img/noticias/$img' alt=''>
	
		<div class='noticia_titulo'>
  	
             <h1>$titulo</h1>

                 <div class='info_noticia'>
			
					<div>
						<i class='fas fa-calendar-alt'></i> 
						$data - $hora
					</div> 
					
					<div>
						<i class='fas fa-user'></i>
						$autor
					</div>
				
					<div><i class='fas fa-comment'></i> <a href='noticia.php?#disqus_thread'></a></div>
				
				</div>";             		
}
?>                    
                   
          </div>
		
		
	</div>
	
</div>	
	
<div id='mapasite'>
		<?php
		echo "<a href='index.php'>Home</a> | ";
		echo "<a href='noticias_index.php'>Notícias</a> | ";
		echo "<a href='#'>$titulo_aba</a>";
		?>	
</div>

<div id="corpo_noticia_individual">	

<section id="noticia_completa_container">
	
	<div id="noticia_completa_subtitulo">
	
	
<?php          
//require_once "config/conectar.php";

//Agora é realizar a querie de busca no banco de dados

$noticia = $_GET['news'];	
	
$sql = "SELECT * FROM noticias WHERE id='$noticia'";


$resultado = mysqli_query($strcon, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");

// Agora iremos "pegar" cada campo da notícia
// e organizar no HTML

while ($linha=mysqli_fetch_array($resultado)) {

$titulo = $linha["titulo"];
$subtitulo = $linha["subtitulo"];
$texto = $linha["texto"];
$data = $linha["data"];
$hora = $linha["hora"];
$img = $linha["img"];
$autor = $linha["autor"];	
	
	
	
	echo "<p>$subtitulo</p>
		
	</div>
	
	<div id='texto_noticia'>
		
		$texto
		
	</div>";
}
?>	
	<div id="relacionadas_container">
		
		<p>Notícias relacionadas</p>
		
		<div id='relacionadas'>
		
		<?php          
           include "config/conectar.php";

//Agora é realizar a querie de busca no banco de dados

$relacionados = $_GET['rel'];		
		
		
$sql = "SELECT * FROM noticias WHERE relacionado = $relacionados ORDER BY 
id DESC LIMIT 3";


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
          

		echo "<div class='noticia_relacionada'>
		
				<img src='img/noticias/$img' alt=''>
			
				<a href='#'>$titulo</a>

			</div>";

}
  ?>
	</div>	
		
	
	<div id="comentarios_container">
		
		<p>Comentários</p>
		
		
		<div class="lista_comentarios">
			
			
			
			
		<div class="comentario">
			
			<div id="disqus_thread"></div>
				<script>

				/**
				*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
				*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
				/*
				var disqus_config = function () {
				this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
				this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
				};
				*/
				(function() { // DON'T EDIT BELOW THIS LINE
				var d = document, s = d.createElement('script');
				s.src = 'https://cineontherocks.disqus.com/embed.js';
				s.setAttribute('data-timestamp', +new Date());
				(d.head || d.body).appendChild(s);
				})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
			
			
		</div>
			
								
		</div>
		
	</div>
	
	
</section>

<aside id="ficha_tec_filme_container">
	<div id="ficha_tec">

<?php          
//require_once "config/conectar.php";

//Agora é realizar a querie de busca no banco de dados

$noticia = $_GET['news'];	
	
$sql = "SELECT * FROM noticias WHERE id='$noticia'";


$resultado = mysqli_query($strcon, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");

// Agora iremos "pegar" cada campo da notícia
// e organizar no HTML

while ($linha=mysqli_fetch_array($resultado)) {

$titulo = $linha["titulo"];
$subtitulo = $linha["subtitulo"];
$texto = $linha["texto"];
$data = $linha["data"];
$hora = $linha["hora"];
$img = $linha["img"];
$autor = $linha["autor"];
$relacionado = $linha["relacionado"];
	
	
$filme = "SELECT * FROM portal_cinema_1.filmes WHERE id = '$relacionado'";	
	
$resultado2 = mysqli_query($strcon, $filme)
or die ("Não foi possível realizar a consulta ao banco de dados");
	
while ($linha2=mysqli_fetch_array($resultado2)) {

$idfilme = $linha2["id"];	
$titulo = $linha2["nome"];
$poster = $linha2["poster"];
	
								
		echo "<img src='img/posters/$poster' alt='$titulo'>
		
		<div id='titulo_filme'>
			<h2>$titulo</h2>
			
			<a href='filme.php?pgtitulo=$titulo&filme=$idfilme'><i class='fas fa-film'></i> Ficha técnica</a>
			<br>
			
			<a href='#'><i class='far fa-star'></i> Crítica</a>
			
		</div>
		
	</div>";
	}

	

}
?>	


			
<div class="ad_aside">
		
		<img src="img/propaganda/ad_word_1.png" alt="">
		
	</div>
	
			
</aside>

</div> <!--FINAL DO CORPO DO SITE-->

<footer>

	<?php
		require_once "footer.php";
	?>

</footer>			
	
</main>

<!--PLUGIN DO BOTÃO DE COMPARTILHAMENTO DO TWITTER-->


<!--AREA DE COMENTÁRIOS DISCUS-->
<script id="dsq-count-scr" src="//cineontherocks.disqus.com/count.js" async></script>
</body>
</html>