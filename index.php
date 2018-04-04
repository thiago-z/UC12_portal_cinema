<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro filme</title>
	<meta name="viewport" content="initial-scale=1">
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/estilo_formulario.css" rel="stylesheet" type="text/css">
</head>

<?php

//Data e horo devidamente configurados	
$data = date("Y-m-d");
$hora = date("H:i:s");
$novadata = substr($data,8,2) . "/" .substr($data,5,2) . 
"/" . substr($data,0,4);
$novahora = substr($hora,0,2) . "h" .substr($hora,3,2) . 
"min"; 
?>

<body>
<main role="main">
<header id="login">
	<div id="portal_id">
		<p>Sistema de cadastro</p>
		<br>
		<br>
		<?php
			include('menu.php');
		?>
		
		
	</div>
		
</header>
<div id="pginicial">
	<section>
		
	<section class='formulario'>
		<h1>Cadastro filme</h1>	
				
		<form action='config/bdinserirfilme.php' method='post'>		
			<fieldset>
				<fieldset class='grupo'>
 
                <div class='campo'>
					<label for='nome'>Nome nacional*</label>
					<input type='text' id='nome' name='nome' style='width: 30em'>
            	</div>
           		<div class='campo'>
					<label for='nomeOriginal'>Nome original*</label>
					<input type='text' id='nomeOriginal' name='nomeOriginal' style='width: 30em' value=''>
           		</div>
				
				</fieldset>
				
				<fieldset class='grupo'>
        		<div class='campo'>
            		<label for='estreia'>Estréia*</label>
           			<input type='text' id='estreia' name='estreia' style='width: 10em' value=''>
        		</div>
					
				<div class='campo'>
            		<label for='duracao'>Duração*</label>
           			<input type='number' id='duracao' name='duracao' style='width: 10em' value=''>
        		</div>	
        		
				<div class='campo'>
            		<label for='genero'>Gênero*</label>
           			<!--<input type='text' id='genero' name='genero' style='width: 10em' value=''>-->
           			<input type="radio" name="genero" value="Terror">Terror
					<br>
					<input type="radio" name="genero" value="Ação">Ação
      				<br>
       				<input type="radio" name="genero" value="Terror">Aventura
					<br>
					<input type="radio" name="genero" value="Ação">Drama
        		</div>
					
				<div class='campo'>
            		<label for='paisOrigem'>País de origem*</label>
           			<input type='text' id='paisOrigem' name='paisOrigem' style='width: 30em' value=''>
        		</div>	
					
            	<div class='campo'>
                	<label for='diretor'>Direção*</label>
               		<input type='text' id='diretor' name='diretor' style='width: 30em' value=''>
            	</div>
					
        		<div class='campo'>
            		<label for='elenco'>Elenco*</label>
           	 		<textarea rows='6' style='width: 30em' id='elenco' name='elenco'></textarea>
        		</div>
					
       			<div class='campo'>
            		<label for='sinopse'>Sinopse*</label>
           	 		<textarea rows='10' style='width: 30em' id='sinopse' name='sinopse'></textarea>
        		</div>
				
				<div class='campo'>
            		<label for='poster'>Poster*</label>
           			<input type='text' id='poster' name='poster' style='width: 30em' value=''>
					<p style='font-size: .6em'>Digite somente nome e extenção exemplo: imagem.jpg</p>
					<p style='font-size: .6em'>Salvar imagem em: UC12_site_cinema\img\posters</p>
        		</div>
				
				
 				</fieldset>	
 				
 				<fieldset class='grupo'>
					<div class='campo'>
						<label for='emCartaz'>Estatus do filme:*</label><br>
						<input type='radio' id='emCartaz' name='emCartaz' value='sim'> Em cartaz	
						<br>
						<input type='radio' id='emCartaz' name='emCartaz' value='nao'> Em breve	
						<br>
						<input type='radio' id='emCartaz' name='emCartaz' value='off' > Já lançado
					</div>		

 				</fieldset>	

 				<fieldset>
					<button type='submit' name='cadastrar'>Cadastrar filme</button>
 				</fieldset>	
 
    		</fieldset>
		</form>
	
		<?php 
			echo "<i>Campos marcados com <b>*</b> são obrigatórios no cadastro.<br>
			<b>Observação</b>: Será inserido no seu cadastro a data atual, bem como a hora atual do cadastro<br>Data: $novadata - Hora: $novahora<br>";
		?>			
						
						
		</section>	
		
		
		
		
		
	</section>
<footer>
	<p>2018 Todos os direitos reservados</p>
</footer>
</main>
</body>
</html>