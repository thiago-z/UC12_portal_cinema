<!doctype html>

<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1">
<title>

	<?php
		$pgtitulo = $_GET["pg"];

		if ($pgtitulo == "") { echo "Página inicial";}

	?>

</title>

<script defer src="js/fontawesome/fontawesome-all.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--LINKS DA BARRA DE BUSCA-->
		<link rel="shortcut icon" href="http://icanbecreative.com/resources/images/favico.ico" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <meta property="og:url"           content="http://demo.icanbecreative.com/css3-animated-search-box/" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="CSS3 Animated Search Box" />
        <meta property="og:description"   content="Your description" />
        <meta property="og:image"         content="http://demo.icanbecreative.com/css3-animated-search-box/featured.jpg" />



<link href="css/estilo_geral.css" rel="stylesheet" type="text/css">
<link href="css/estilo_index.css" rel="stylesheet" type="text/css">
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

	<script type="text/javascript">
        function searchToggle(obj, evt){
            var container = $(obj).closest('.search-wrapper');

            if(!container.hasClass('active')){
                  container.addClass('active');
                  evt.preventDefault();
            }
            else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
                  container.removeClass('active');
                  // clear input
                  container.find('.search-input').val('');
                  // clear and hide result container when we press close
                  container.find('.result-container').fadeOut(100, function(){$(this).empty();});
            }
        }

        function submitFn(obj, evt){
            value = $(obj).find('.search-input').val().trim();

            _html = "Yup yup! Your search text sounds like this: ";
            if(!value.length){
                _html = "Yup yup! Add some text friend :D";
            }
            else{
                _html += "<b>" + value + "</b>";
            }

            $(obj).find('.result-container').html('<span>' + _html + '</span>');
            $(obj).find('.result-container').fadeIn(100);

            evt.preventDefault();
        }
        </script>

</head>



<body>
<main role="main">

<header>

  <?php

	require_once "menu.php";

	?>

</header>



<div id="topo_slides_container">

	<!--ESTA SECTION SÓ TEM O SLIDER-->
	<section id='destaques_topo'>



 	    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>

        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">

<?php          
 require_once "config/conectar.php";

//Agora é realizar a querie de busca no banco de dados

$sql = "SELECT * FROM noticias WHERE destaque = 'on' ORDER BY 
id DESC LIMIT 3";


$resultado = mysqli_query($strcon, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");

// Agora iremos "pegar" cada campo da notícia
// e organizar no HTML

while ($linha=mysqli_fetch_array($resultado)) {

$id = $linha["id"];	
$titulo = $linha["titulo"];
$subtitulo = $linha["subtitulo"];
$imgDestaque = $linha["imgDestaque"];	

           
           
         
           echo "<div data-p='225.00'>
                <img data-u='image' src='img/slideshow/$imgDestaque' />
                <div class='noticia_titulo_home'>
                    <!--<img style='position:absolute;top:0px;left:0px;width:470px;height:160px;' src='img/c-phone-horizontal.png' />-->


                 	<h1>$titulo</h1>
                    <h2>$subtitulo</h2>

                 	<a href='noticia.php?news=$id&pgtitulo=$titulo'><i class='fas fa-arrow-circle-right'></i> Continuar lendo</a>

                </div>
            </div>";
}
  ?>         

        </div>

        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;left:150px;" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>

        <!-- Arrow Navigator -->
       <!-- <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>-->
    </div>

    <script type="text/javascript">jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End -->




	</section>
	<!--FIM DA SECTION QUE SÓ TEM O SLIDER-->

</div>
<!--FIM DA DIV COM SLIDER E MENUS-->
<?php
	
$pgtitulo = $_GET["pg"];

?>	
	<div id='mapasite'>
		<?php
		echo "Home ";
		?>	
	</div>

	<div class='pg_titulo'>
	<?php
		if ($pgtitulo == '') { echo 'Home';}
		?>
	</div>

<div id="corpo_home">

<!--INICIO SECTION COM AS DIVS DE CRITICAS, ARTIGOS, ETC-->
<section id="artigos_container">

	<div id='lista_artigos'>


<?php          
           include "config/conectar.php";

//Agora é realizar a querie de busca no banco de dados

$noticia = $_GET['news'];		
		
		
$sql = "SELECT * FROM noticias WHERE TIPO= 2 LIMIT 4";


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
          		

		echo "
		<div class='artigo'>
		
		<div class='artigo_tag'>Artigo</div>
		
		
			<a href='noticia.php?news=$id&pgtitulo=$titulo&rel=$relacionado'>
			
			<img src='img/noticias/$img'>
			
				<h4>$titulo</h4>

			</a>

	</div>";

}
  ?>

	
	</div> <!--FINAL DO CONTAINER DOS ARTIGOS-->
	
<?php 
	echo "<p><a href='noticia.php?news=$id&pgtitulo=$titulo'><i class='fas fa-plus-square'></i> TODOS OS ARTIGOS</a></p>";
?>

</section>

<!--INICIO SECTION COM AS DIVS DE LISTA DE NOTICIAS-->
<section id="noticias_container">


	<h2>Últimas notícias</h2>

	<div class="lista_noticias">
		
		
<?php          
           include "config/conectar.php";

//Agora é realizar a querie de busca no banco de dados

$noticia = $_GET['news'];		
		
		
$sql = "SELECT * FROM noticias WHERE tipo= 1 ORDER BY 
id DESC LIMIT 15";


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
<section id="filmes_cartaz_container">

	<h2>Em cartaz</h2>

	<div class="cartaz_container">
		
		<?php

				

				//conectar ao banco de dados
				include 'config/conectar.php';


				//Agora é realizar a querie de busca no banco de dados

				$sql = "SELECT * FROM filmes WHERE emCartaz='sim' ORDER BY 
				id DESC LIMIT 8";

				$resultado = mysqli_query($strcon, $sql)
				or die ("Não foi possível realizar a consulta ao banco de dados");

				while ($linha=mysqli_fetch_array($resultado)) {
						
				$idfilme = $linha["id"];	
				$poster = $linha["poster"];
				$titulo = $linha["nome"];	
					
					
				echo "<figure>
  				
					<a class='poster' href='filme.php?pgtitulo=$titulo&filme=$idfilme'>
						<img src='img/posters/$poster' alt='$titulo'>
					</a>

				</figure>"; 
					

				}
		?>
	
	

	</div>
	
	<p><a href="lancamentos_index.php"><i class="fas fa-list-alt"></i> TODOS</a></p>


	<div class="ad_aside">
		
		<img src="img/propaganda/ad_word_1.png" alt="">
		
	</div>



	<h2>Em breve</h2>

	<div class="embreve_container">

			<?php

				

				//conectar ao banco de dados
				include 'config/conectar.php';


				//Agora é realizar a querie de busca no banco de dados

				$sql = "SELECT poster FROM filmes WHERE emCartaz='nao' ORDER BY 
				id DESC LIMIT 8";

				$resultado = mysqli_query($strcon, $sql)
				or die ("Não foi possível realizar a consulta ao banco de dados");

				while ($linha=mysqli_fetch_array($resultado)) {

				$poster = $linha["poster"];
			
					
				echo "<figure>
  				
					<a class='poster' href='filme.php?pgtitulo=$titulo&filme=$idfilme'>
						<img src='img/posters/$poster' alt='$titulo'>
					</a>

				</figure>"; 	
					
					
					
					
					
				}
		?>


		</div>

		<p><a href="lancamentos_index.php"><i class="fas fa-list-alt"></i> TODOS</a></p>

</section>



</div><!--final do corpo-->





<footer>

	<?php
		require_once "footer.php";
	?>

</footer>

</main>


	<script id="dsq-count-scr" src="//cineontherocks.disqus.com/count.js" async></script>
</body>
</html>
