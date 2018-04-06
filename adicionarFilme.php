<?php session_start(); 

if(!isset($_SESSION['aberta'])){
	header('Location: login.php');
	
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastrar Filme</title>
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
		<li><a href="verFilmes.php">Viualizar filmes</a></li>
		
	</ul>
	
</nav>	

<section class='formulario'>										

<?php
//Inclui o arquivo de conexao ao banco de dados
include_once("config/conectar.php");

?>

		<h1>Cadastro filme</h1>	
				
		<form action='config/bdinserirfilme.php' method='post' accept-charset="UTF-8">		
			<fieldset>
				<fieldset class='grupo'>
 
                <div class='campo'>
					<label for='nome'>Nome nacional*</label>
					<input type='text' id='nome' name='nome' style='width: 30em' required>
            	</div>
           		<div class='campo'>
					<label for='nomeOriginal'>Nome original*</label>
					<input type='text' id='nomeOriginal' name='nomeOriginal' style='width: 30em' value='' required>
           		</div>
				
				</fieldset>
				
				<fieldset class='grupo'>
        		<div class='campo'>
            		<label for='estreia'>Estréia*</label>
           			<input type='text' id='estreia' name='estreia' style='width: 10em' value='' required>
        		</div>
					
				<div class='campo'>
            		<label for='duracao'>Duração*</label>
           			<input type='number' id='duracao' name='duracao' style='width: 10em' value='' required>
        		</div>	
        		
        		
        		<div class='campo'>
            		<label for='genero' required>Gênero*</label>
            		
        		<?php
				
					include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql = "SELECT * FROM generos ORDER BY idGenero";
					$resultado = mysqli_query($strcon,$sql) or die(mysql_error()."<br>Erro ao executar a inserção dos dados");

					if (mysqli_num_rows($resultado)!=0){

 						while($elemento = mysqli_fetch_array($resultado))
 						{
   						$idgenero = $elemento['idGenero'];
						$genero = $elemento['nomeGenero'];
   						echo '<input type="checkbox" name="genero" value="'.$genero.'"> '.$genero.'<br>';
						}

						}
				    ?>	

        		</div>

				<div class='campo'>
            		<label for='paisOrigem'>País de origem*</label>
           			<input type='text' id='paisOrigem' name='paisOrigem' style='width: 30em' value='' required>
        		</div>	
					
            	<div class='campo'>
                	<label for='diretor'>Direção*</label>
               		<input type='text' id='diretor' name='diretor' style='width: 30em' value='' required>
            	</div>
					
        		<div class='campo'>
            		<label for='elenco'>Elenco*</label>
           	 		<textarea rows='6' style='width: 30em' id='elenco' name='elenco' required></textarea>
        		</div>
        		
        		<!--EDITOR DE CÓDIGO-->	
           	 	<script src="ckeditor/ckeditor.js"></script>
           	 	
           	 		<script>
						CKEDITOR.replace( 'elenco' );
					</script>
					
       			<div class='campo'>
            		<label for='sinopse'>Sinopse*</label>
           	 		<textarea rows='10' style='width: 30em' id='sinopse' name='sinopse' required></textarea>
        		</div>
           	 	
           	 		<script>
						CKEDITOR.replace( 'sinopse' );
					</script>
				
				
				<div class='campo'>
            		<label for='poster'>Poster*</label>
           			<input type='text' id='poster' name='poster' style='width: 30em' value='' required>
					<p style='font-size: .6em'>Digite somente nome e extenção exemplo: imagem.jpg</p>
					<p style='font-size: .6em'>Salvar imagem em: UC12_site_cinema\img\posters</p>
        		</div>
				
				
 				</fieldset>	
 				
 				<fieldset class='grupo'>
					<div class='campo'>
						<label for='emCartaz'>Estatus do filme:*</label><br>
						<input type='radio' id='emCartaz' name='emCartaz' value='sim' checked> Em cartaz	
						<br>
						<input type='radio' id='emCartaz' name='emCartaz' value='nao'> Em breve	
						<br>
						<input type='radio' id='emCartaz' name='emCartaz' value='off' > Já lançado
					</div>		

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