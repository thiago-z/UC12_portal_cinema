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
	
	
		
		<!--PARTE SUPERIOR COM LOGON E MENU MOVIDO PARA ARQUIVO SEPARADO-->
	<?php
		
		include('logon_menu.php');
		
	?>
		
	
		
</header>

<div id="pginicial">
		
		
<nav class="submenu">
	
	<ul>
		
		<li><a href="index.php">Voltar para Home</a></li>
		<li><a href="verNoticias.php">Visualizar notícias</a></li>
		
	</ul>
	
</nav>		

<h2>Cadastro de notícias e artigos para o site</h2>
<p>Insira todos os dados corretamente.</p>

<div class="container">
  <form action='bdinserirnoticia.php?autor=<?php echo "".$_SESSION['id']."";?>' method='post' accept-charset="UTF-8">
   
    <div class="row_small">
      <div class="col-25">
        <label for="autor">Autor da notícia</label>
      </div>
      <div class="col-25">
       
       <?php
							if(isset($_SESSION['aberta'])) {	// Verifica se usuário já está logado			
							include("config/conectar.php");					
							echo "<input type='text' id='fname' name='autor' value=".$_SESSION['nome'].">";
							}
						?>

      </div>
    </div>
    
    <div class="row_small">
      <div class="col-25">
        <label for="tipo">Tipo</label>
      </div>
      <div class="col-25">
        <select id="country" name="tipo">
          <option value="1">Notícia</option>
          <option value="2">Outro</option>
        </select>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="titulo">Título notícia</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="titulo" placeholder="Digite o título da notícia..">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="subtitulo">Subtítulo notícia</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="subtitulo" placeholder="Digite o subtítulo da notícia..">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="texto">Texto</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="texto" placeholder="Digite aqui o texto da matéria.." style="height:200px"></textarea>
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
        <input type="text" id="lname" name="img" placeholder="Ex: noticia_tal.jpg">
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
 						<option value='' selected='selected'>Filme relacionado:</option>";
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
        <input type="text" id="lname" name="imgDestaque" placeholder="Ex: noticia_tal_destaque.jpg">
      </div>
    </div>
    
    
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