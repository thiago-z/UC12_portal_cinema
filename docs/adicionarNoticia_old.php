<?php session_start(); 

if(!isset($_SESSION['aberta'])){
	header('Location: login.php');
	
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastrar Notícia ou artigo</title>
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
	<!--PARTE SUPERIOR COM LOGON E MENU MOVIDO PARA ARQUIVO SEPARADO-->
	<?php
		
		include('config/logon_menu.php');
		
	?>
		
		
	</div>
		
</header>
<div id="pginicial">
		
		
<nav class="submenu">
	
	<ul>
		
		<li><a href="index.php">Voltar para Home</a></li>
		<li><a href="verNoticias.php">Visualizar notícias</a></li>
		
	</ul>
	
</nav>		

		<section>
		
		<h1>Cadastro de notícias e artigos para o site</h1>	
				
		<form action='config/bdinserirnoticia.php?autor=<?php echo "".$_SESSION['id']."";?>' method='post'>		
			<fieldset>
				<fieldset class='grupo'>
				
					<div class='campo'>
						<p>Autor da notícia ou artigo:</p>
						
						<?php
							if(isset($_SESSION['aberta'])) {	// Verifica se usuário já está logado			
							include("config/conectar.php");					
							echo "<h2>" . $_SESSION['nome'] . "</h2>";
							}
						?>

           			</div>
 				</fieldset>
             
             <fieldset class='grupo'>
              
              <div class='campo'>
					<label for='tipo'>Tipo*</label>
					<input type='radio' id='tipo' name='tipo' value='1'>Notícia
          			<br>
           			<input type='radio' id='tipo' name='tipo' value='2'>Outro
            	</div>
           		
           		<div class='campo'>
					<label for='titulo'>Título*</label>
					<input type='text' id='titulo' name='titulo' style='width: 30em' value=''>
           		</div>
				
				<div class='campo'>
					<label for='subtitulo'>Subtitulo*</label>
					<input type='text' id='subtitulo' name='subtitulo' style='width: 30em' value=''>
           		</div>
				
				<div class='campo'>
            		<label for='texto'>Texto*</label>
           	 		<textarea rows='50' style='width: auto' id='texto'  name='texto'></textarea>
           	 		
           	 	<!--EDITOR DE CÓDIGO-->	
           	 	<script src="ckeditor/ckeditor.js"></script>
           	 	
           	 		<script>
						CKEDITOR.replace( 'texto' );
					</script>

           	 		
        		</div>
  
				</fieldset>
 				
 				<fieldset class='grupo'>
 				
 				<div class='campo'>
            		<label for='img'>Imagem para notícia ou artigo*</label>
           			<input type='text' id='img' name='img' style='width: 30em' value=''>
					<p style='font-size: .6em'>Digite somente nome e extenção, exemplo: imagem.jpg</p>
					<p style='font-size: .6em'>Salvar imagem para notícia em: UC12_site_cinema\img\noticias</p>
       				<p style='font-size: .6em'>Salvar imagem para artigo em: UC12_site_cinema\img\noticias\artigos</p>
        		</div>
        		
        		
        		<div class='campo'>
					<label for='destaque'>Destaque?*</label>
					<input type='radio' id='destaque' name='destaque' value='on'>Sim, mostrar em destaque no Home
          			<br>
           			<input type='radio' id='destaque' name='destaque' value='off'>Não, somente cadastrar em notícias
            	</div>
        		
        		<div class='campo'>
            		<label for='imgDestaque'>Imagem de destaque</label>
           			<input type='text' id='imgDestaque' name='imgDestaque' style='width: 30em' value=''>
					<p style='font-size: .6em'>Salvar imagem destaque em: UC12_site_cinema\img\slideshow</p>
        		</div>
 				</fieldset>	
 				

 				<fieldset class='grupo'>
 				
 					<?php
				
						include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql = "SELECT * FROM filmes ORDER BY id";
					$resultado = mysqli_query($strcon,$sql) or die(mysql_error()."<br>Erro ao executar a inserção 					dos dados");

					if (mysqli_num_rows($resultado)!=0){

 					echo "<select name='relacionado'>
 						<option value='' selected='selected'>Selecione o filme relacionado:*</option>";
 						while($elemento = mysqli_fetch_array($resultado))
 						{
   						$filmeId = $elemento['id'];
						$filmeNome = $elemento['nome'];
   						echo '<option value="'.$filmeId.'">'.$filmeNome.'</option>';
						}

						}
					
					echo "<input name='data' type='hidden' value='$novadata'>
					<input name='hora' type='hidden' value='$novahora'>";
					
					
				    ?>	
 				
 					</select> 
 				
 				</fieldset>

				
				

 				<fieldset>
					<button type='submit' name='submit'>Cadastrar filme</button>
 				</fieldset>	
 
    		</fieldset>
		</form>
	
		<?php 
			echo "<i>Campos marcados com <b>*</b> são obrigatórios no cadastro.<br>
			<b>Observação</b>: Será inserido no seu cadastro a data atual, bem como a hora atual do cadastro<br>Data: $novadata - Hora: $novahora<br>";
		?>		

		
	</section>

	
</div>	
	
<footer>
	<p>2018 Todos os direitos reservados</p>
</footer>
</main>
</body>
</html>