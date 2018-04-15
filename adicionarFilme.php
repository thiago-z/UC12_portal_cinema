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

<h2>Cadastro de filmes no banco de dados do site</h2>
<p>Insira todos os dados corretamente.</p>

<div class="container">
  <form action='config/bdinserirfilme.php' method='post' accept-charset="UTF-8">
   
    <div class="row">
      <div class="col-25">
        <label for="nome">Título nacional</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="nome" placeholder="Título">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="nomeOriginal">Título original</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="nomeOriginal" placeholder="Título original">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="estreia">Data de estréia</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="estreia" placeholder="Data">
      </div>
    </div>
    
    <div class="row_small">
      <div class="col-25">
        <label for="duracao">Duração</label>
      </div>
      <div class="col-25">
        <input type="number" id="lname" name="duracao" placeholder="Duração">
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
   						echo '<option value='.$idgenero.'>'.$genero.'</option>';
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
        <input type="text" id="lname" name="paisOrigem" placeholder="Digite o país..">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="diretor">Direção</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="diretor" placeholder="Diretor..">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="elenco">Elenco</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="elenco" placeholder="Digite nome dos atores.." style="height:200px"></textarea>
      </div>
    </div>
    
    <!--EDITOR DE CÓDIGO-->	
           	 	<script src="ckeditor/ckeditor.js"></script>
           	 	
           	 		<script>
						CKEDITOR.replace( 'elenco' );
					</script>
	
	<div class="row">
      <div class="col-25">
        <label for="sinopse">Elenco</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="sinopse" placeholder="Digite a sinopse do filme.." style="height:200px"></textarea>
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
        <input type="text" id="lname" name="poster" placeholder="Ex: filme_tal.jpg">
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
    
    <br>
    <br>
    <br>
    <br>
    
    
    <div class="row">
      <input type="submit" value="Submit" name='submit'>
    </div>
  </form>
</div>

	
</div>	
	
<footer>
	<p>2018 Todos os direitos reservados</p>
</footer>
</main>
</body>
</html>