<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1">
<title>

	<?php
		$pgtitulo = $_GET["pg"];

		if ($pgtitulo == "contato") { echo "Página de contato";}

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
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css">
<link href="css/estilo_formulario.css" rel="stylesheet" type="text/css">
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

	include_once "menu.php";

	?>

</header>

<div id="formulario_topo">
	
	<div class='pg_titulo_topo'>
	<?php
		
		$pgtitulo = $_GET["pg"];
		
		if ($pgtitulo == 'contato') { echo 'Contato';}
		
		?>
	</div>
	
</div>


<!--FIM DA DIV COM SLIDER E MENUS-->
<?php
	
$pgtitulo = $_GET["pg"];

?>	
	<div id='mapasite'>
		<?php
		echo "<a href='index.php'>Home </a>| ";
		echo "<a href='#'>Contato</a>";
		?>	
	</div>

<div id="corpo_home">


<!--CONTEUDO DA PÁGINA CONTATO AQUI-->

<div class="container">
  <form action='' method='post' accept-charset="UTF-8">
   

    <div class="row">
      <div class="col-25">
        <label for="nome">Nome completo*</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="nome" placeholder="Digite seu nome..">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="email">Email*</label>
      </div>
      <div class="col-75">
        <input type="email" id="lname" name="email" placeholder="Digite seu email..">
      </div>
    </div>
    
	
	<div class="row">
      <div class="col-25">
        <label for="mensagem">Mensagem*</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="mensagem" placeholder="Digite sua mensagem.." style="height:200px"></textarea>
      </div>
    </div>

    <div class="row">
      <input type="submit" value="Enviar" name='submit'>
    </div>
    
  </form>
  
</div>



</div><!--final do corpo-->


<footer>

	<?php
		require_once "footer.php";
	?>

</footer>

</main>



</body>
</html>