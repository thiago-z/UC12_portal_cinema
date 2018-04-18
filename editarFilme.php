<?php session_start();

if(!isset($_SESSION['aberta'])) {
	header('Location: login.php');
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Filme</title>
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
		
		include('logon_menu.php');
		
	?>
		
		
	</div>
		
</header>
<div id="pginicial">
		
		
<nav class="submenu">
	
	<ul>
		
		<li><a href="index.php">Voltar para Home</a></li>
		<li><a href="verFilmes.php">Visualizar filmes</a></li>
		
	</ul>
	
</nav>		

<h2>Editar notícia ou artigo selecionado</h2>
<p>Insira todos os dados corretamente.</p>


<?php
	//Incluir o arquivo de conexão ao banco de dados:
	include_once("config/conectar.php");
	
	$idFilme = $_GET["id"];

	
	//buscar os dados em ordem descrescente (entrada mais recente primeiro)
	$result = mysqli_query($strcon, "SELECT * FROM filmes WHERE id = $idFilme");
	
	while($linha = mysqli_fetch_array($result)) {
	
	$id = $linha["id"];	
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
?>


<div class="container">
  <form action='bdatualizarfilme.php?editar=<?php echo $idFilme?>' method='post' accept-charset="UTF-8">
   
    
    
    <div class="row">
      <div class="col-25">
        <label for="nome">Título notícia</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="nome" value="<?php echo"$nome"?>">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="nomeOriginal">Subtítulo notícia</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="nomeOriginal" value="<?php echo"$nomeOriginal"?>">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="texto">Texto</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="texto" value=<?php echo "$texto"?> </textarea>
      </div>
    </div>
    
    <!--EDITOR DE CÓDIGO-->	
           	 	<script src="ckeditor/ckeditor.js"></script>
           	 	
           	 		<script>
						CKEDITOR.replace( 'texto' );
					</script>
								
					
    <div class="row">
      <div class="col-25">
        <label for="img">Imagem da notícia</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="img" value="<?php echo"$imgnoticia"?>">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="relacionado">Filme relacionado</label>
      </div>
      <div class="col-75">
          
          <?php
				
				include_once('config/conectar.php');


					if (!$strcon) {
 					die('Não foi possível conectar ao MySQL');
					}
 					$sql = "SELECT * FROM filmes ORDER BY id";
					$resultado = mysqli_query($strcon,$sql) or die(mysql_error()."<br>Erro ao executar a inserção 					dos dados");

					if (mysqli_num_rows($resultado)!=0){

 					echo "<select name='relacionado'>
 						<option value='' selected='selected'>Selecionar filme..</option>";
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
      </div>
    </div>
    
    
    <div class="row_small">
      <div class="col-25">
        <label for="destaque">Destaque em Home?</label>
      </div>
      <div class="col-25">
        <select id="country" name="destaque">
          <option value="on">Sim, destacar!</option>
          <option value="off" selected>Não destacar!</option>
        </select>
      </div>
    </div>
    
    <div class="row_small">
      <div class="col-25">
        <label for="imgDestaque">Imagem de destaque</label>
      </div>
      <div class="col-25">
        <input type="text" id="lname" name="imgDestaque" value="<?php echo"$imgDestaque"?>">
      </div>
    </div>
    
    
    <br>
    <br>
    
    
    <div class="row">
      <input type="submit" value="Submit" name='submit'>
    </div>
  </form>
</div>		


	
<?php
//FIM DO PHP QUE PUXA OS DADOS DA NOTÍCIA		
}
?>
				
</div>	
	
<footer>
	<p>2018 Todos os direitos reservados</p>
</footer>
</main>