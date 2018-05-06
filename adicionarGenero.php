<?php session_start(); 

if(!isset($_SESSION['aberta'])){
	header('Location: login.php');
	
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastrar Gêneros</title>
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
		<li><a href="verFilmes.php">Viualizar filmes</a></li>
		
	</ul>
	
</nav>	

<h2>Cadastro de gêneros no banco de dados do site</h2>
<p>Insira todos os dados corretamente.</p>

<br>

<p>Gêneros já cadastrados: </p>
<?php
	
       

	$result = mysqli_query($strcon, "SELECT * FROM generos ORDER BY nomeGenero ASC");
	
	while($linha = mysqli_fetch_array($result)) {
	
	$nome = $linha["nomeGenero"];
	
	echo "<b>$nome</B>, ";	
	}
	
	
	?>

<br>
<br>


<div class="container">
  <form action='bdinserirgenero.php' method='post' accept-charset="UTF-8">
   
    <div class="row">
      <div class="col-25">
        <label for="nomeGenero">Novo gênero</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="nomeGenero" placeholder="Gênero">
      </div>
    </div>
    
    
    
    <div class="row">
      <input type="submit" value="Submit" name='submit'>
    </div>
  </form>
</div>

	
</div>	
<br>
<br><br>
<br><br>
<br>	
<footer>
	<p>2018 Todos os direitos reservados</p>
</footer>
</main>
</body>
</html>