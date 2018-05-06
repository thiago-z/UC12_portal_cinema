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
	
	
		
		<!--PARTE SUPERIOR COM LOGON E MENU MOVIDO PARA ARQUIVO SEPARADO-->
	<?php
		
		include('logon_menu.php');
		
	?>
		
	
		
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
	$nome = $linha["nome"];
	$nomeOriginal = $linha["nomeOriginal"];
	$estreia = $linha["estreia"];
	$duracao = $linha["duracao"];
	$genero = $linha["genero"];
	$paisOrigem = $linha["paisOrigem"];
	$direcao = $linha["diretor"];
	$elenco = $linha["elenco"];
	$sinopse = $linha["sinopse"];
	$imgPoster = $linha["poster"];
	$cartaz = $linha["emCartaz"]; 
	$imgFundo = $linha["imgFundo"];
	$trailer = $linha["trailer"]; 
?>


<div class="container">
  <form action='bdatualizarfilme.php?editar=<?php echo $idFilme?>' method='post' accept-charset="UTF-8">
   
   <div class="row">
      <div class="col-25">
        <label for="nome">Título nacional</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="nome" value="<?php echo "$nome"?>">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="nomeOriginal">Título original</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="nomeOriginal" value="<?php echo "$nomeOriginal"?>">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="estreia">Data de estréia</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="estreia" value="<?php echo "$estreia"?>">
      </div>
    </div>
    
    <div class="row_small">
      <div class="col-25">
        <label for="duracao">Duração</label>
      </div>
      <div class="col-25">
        <input type="number" id="lname" name="duracao" value="<?php echo "$duracao"?>">
      </div>
    </div>
    
    <div class="row_small">
      <div class="col-25">
        <label for="genero">Gênero</label>
      </div>
      <div class="col-25">
        <select id="country" name="genero">
         
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
   						echo '<option value='.$genero.'>'.$genero.'</option>';
						}
          
			}
		?>		  
			  
        </select>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="paisOrigem">País de origem</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="paisOrigem" placeholder="Digite o país.." value="<?php echo "$paisOrigem"?>">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="diretor">Direção</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="diretor" placeholder="Diretor.." value="<?php echo "$direcao"?>">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="elenco">Elenco</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="elenco" placeholder="Digite nome dos atores.." style="height:200px"><?php echo "$elenco"?></textarea>
      </div>
    </div>
    
    <!--EDITOR DE CÓDIGO-->	
           	 	<script src="ckeditor/ckeditor.js"></script>
           	 	
           	 		<script>
						CKEDITOR.replace( 'elenco' );
					</script>
	
	<div class="row">
      <div class="col-25">
        <label for="sinopse">Sinopse</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="sinopse" placeholder="Digite a sinopse do filme.."  style="height:200px"><?php echo "$sinopse"?></textarea>
      </div>
    </div>
    
    <!--EDITOR DE CÓDIGO-->	
           	 	<script src="ckeditor/ckeditor.js"></script>
           	 	
           	 		<script>
						CKEDITOR.replace( 'sinopse' );
					</script>								
					
    <div class="row">
      <div class="col-25">
        <label for="poster">Poster do filme</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="poster" placeholder="Ex: filme_tal.jpg" value="<?php echo "$imgPoster"?>">
      </div>
    </div>
    
     <div class="row">
      <div class="col-25">
        <label for="imgFundo">Imagem de fundo para ficha técnica</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="imgFundo" placeholder="Ex: filme_tal_bio.jpg" value="<?php echo "$imgFundo"?>">
      </div>
    </div>
    
     <div class="row">
      <div class="col-25">
        <label for="trailer">Trailer do filme</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="trailer" placeholder="Somente o final da url do YouTube" value="<?php echo "$trailer"?>">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="emCartaz">Estatus do filme</label>
      </div>
      <div class="col-75">
        <select id="country" name="emCartaz">
          <option value="sim">Em cartaz</option>
          <option value="nao">Em breve</option>
          <option value="off">Já lançado</option>
        </select>
      </div>
    </div>
    

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