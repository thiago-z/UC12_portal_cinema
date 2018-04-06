<?php session_start();

if(!isset($_SESSION['aberta'])) {
	header('Location: login.php');
}
?>

<?php

//Data e horo devidamente configurados	
$data = date("Y-m-d");
$hora = date("H:i:s");
$novadata = substr($data,8,2) . "/" .substr($data,5,2) . 
"/" . substr($data,0,4);
$novahora = substr($hora,0,2) . "h" .substr($hora,3,2) . 
"min"; 
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar</title>
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
// Incluir o arquivo d coexao ao bano de dados
include_once("config/conectar.php");

if(isset($_POST['update'])){
	$nome = $_POST["nome"];
	$nomeOriginal = $_POST["nomeOriginal"];
	$estreia = $_POST["estreia"];
	$duracao = $_POST["duracao"];
	$genero = $_POST["genero"];
	$paisOrigem = $_POST["paisOrigem"];
	$direcao = $_POST["diretor"];
	$elenco = $_POST["elenco"];
	$sinopse = $_POST["sinopse"];
	$imgPoster = $_POST["poster"];
	$cartaz = $_POST["emCartaz"]; 
	
	if (empty($nome) ||  empty($nomeOriginal) ||  empty($estreia) || empty($duracao) ||  empty($paisOrigem) ||  empty($direcao) ||  empty($elenco) || empty($sinopse) ||  empty($imgPoster) ||  empty($cartaz)){
		
		if(empty($nome)){
			echo "<strong>Campo Nome está vazio.</strong><br>";
		}
		if(empty($nomeOriginal)){
			echo "<strong>Campo Quantidade está vazio.</strong><br>";
		}
		
		if(empty($estreia)){
			echo "<strong>Campo Preço está vazio.</strong><br>";
		}
		
		if(empty($duracao)){
			echo "<strong>Campo Nome está vazio.</strong><br>";
		}
		
		if(empty($paisOrigem)){
			echo "<strong>Campo Preço está vazio.</strong><br>";
		}
		
		if(empty($direcao)){
			echo "<strong>Campo Nome está vazio.</strong><br>";
		}
		if(empty($elenco)){
			echo "<strong>Campo Quantidade está vazio.</strong><br>";
		}
		
		if(empty($sinopse)){
			echo "<strong>Campo Preço está vazio.</strong><br>";
		}
		
		if(empty($imgPoster)){
			echo "<strong>Campo Nome está vazio.</strong><br>";
		}
		if(empty($cartaz)){
			echo "<strong>Campo Quantidade está vazio.</strong><br>";
		}
		
		
		//link para a pagina anterior
		echo "<br><a href='javascript:self.history.back();'>Voltar</a>";

	}else{
		//Atualizando a tabela
		$result = mysqli_query($strcon, "UPDATE produtos SET nome='$nome', qtde='$qtde', preco='preco' WHERE id='$id'");
		
		//Redericionar para a pagina de visualizacao -> ver.php
		header("Location: verFilme.php");
	}
}
?>
 
	
<a href="index.php">Home</a>  | <a href="verFilmes.php">Ver Produtos</a> | <a href="logout.php">Logout</a>
	 <br><br>

	 
	 	 
	<section class='formulario'>										

<?php
//Inclui o arquivo de conexao ao banco de dados
include_once("config/conectar.php");


 //Obtendo o  id a partir da URL
 $id = $_GET['id'];
 
 //Selecionando dados associados com o id em oarticular
 $result = mysqli_query($strcon, "SELECT * FROM filmes WHERE id=$id");
 
 while($res = mysqli_fetch_array($result)){
	$nome = $_POST["nome"];
	$nomeOriginal = $_POST["nomeOriginal"];
	$estreia = $_POST["estreia"];
	$duracao = $_POST["duracao"];
	$genero = $_POST["genero"];
	$paisOrigem = $_POST["paisOrigem"];
	$direcao = $_POST["diretor"];
	$elenco = $_POST["elenco"];
	$sinopse = $_POST["sinopse"];
	$imgPoster = $_POST["poster"];
	$cartaz = $_POST["emCartaz"]; 
	 
 
	 
	
		echo "<h1>Cadastro filme</h1>	
				
		<form action='bdinserirfilme.php' method='post' accept-charset='UTF-8'>		
			<fieldset>
				<fieldset class='grupo'>
 
                <div class='campo'>
					<label for='nome'>Nome nacional*</label>
					<input type='text' id='nome' name='nome' style='width: 30em' value='$nome' required>
            	</div>
           		<div class='campo'>
					<label for='nomeOriginal'>Nome original*</label>
					<input type='text' id='nomeOriginal' name='$nomeOriginal' style='width: 30em' value=''>
           		</div>
				
				</fieldset>
				
				<fieldset class='grupo'>
        		<div class='campo'>
            		<label for='estreia'>Estréia*</label>
           			<input type='text' id='estreia' name='estreia' style='width: 10em' value= '$estreia'>
        		</div>
					
				<div class='campo'>
            		<label for='duracao'>Duração*</label>
           			<input type='number' id='duracao' name='duracao' style='width: 10em' value=''>
        		</div>	
        		
        		
        		<div class='campo'>
            		<label for='genero'>Gênero*</label>";
            		
 ?>       		
<?php				
					include_once('config/conectar.php');



					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql = 'SELECT * FROM generos ORDER BY idGenero';
					$resultado = mysqli_query($strcon,$sql) or die(mysql_error().'<br>Erro ao executar a inserção dos dados');

					if (mysqli_num_rows($resultado)!=0){

 						while($elemento = mysqli_fetch_array($resultado))
 						{
   						$idgenero = $elemento['idGenero'];
						$genero = $elemento['nomeGenero'];
   						echo "<input type='checkbox' name='genero' value='$genero'> $genero<br>";
						}

						}
				   

        		echo "</div>

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
					<button type='submit' name='update'>Cadastrar filme</button>
 				</fieldset>	
 
    		</fieldset>
		</form>
	
		
			<i>Campos marcados com <b>*</b> são obrigatórios no cadastro.<br>
			<b>Observação</b>: Será inserido no seu cadastro a data atual, bem como a hora atual do cadastro<br>Data: $novadata - Hora: $novahora<br>";
	}	
		?>			
						

	
	</section>	
</div>	
	
<footer>
	<p>2018 Todos os direitos reservados</p>
</footer>
</main>
</body>
</html>