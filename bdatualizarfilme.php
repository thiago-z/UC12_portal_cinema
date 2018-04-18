<?php session_start();

if(!isset($_SESSION['aberta'])) {
	header('Location: login.php');
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edição de notícia</title>
	<meta name="viewport" content="initial-scale=1">
<link href="../css/estilo.css" rel="stylesheet" type="text/css">
<link href="../css/estilo_formulario.css" rel="stylesheet" type="text/css">

<script defer src="../js/fontawesome/fontawesome-all.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
						
						
						
<section>
	
	<?php

//Data e horo devidamente configurados	
$data = date("Y-m-d");
$hora = date("H:i:s");
$novadata = substr($data,8,2) . "/" .substr($data,5,2) . 
"/" . substr($data,0,4);
$novahora = substr($hora,0,2) . "h" .substr($hora,3,2) . 
"min"; 

//conectar ao banco de dados
include 'conectar.php';


//Vamos definir as variáveis de data e hora
//para inserção no banco de dados


//vamos criar uma variável especial para a querie sql	
$tipo = $_POST["tipo"];
$titulo = $_POST["titulo"];
$subtitulo = $_POST["subtitulo"];
$texto = $_POST["texto"];
$novadata = $_POST["data"];
$novahora = $_POST["hora"];
$autor = $_GET["autor"];
$relacionado = $_POST["relacionado"];
$img = $_POST["img"];
$destaque = $_POST["destaque"];
$imgDestaque = $_POST["imgDestaque"];


	
$editar = $_GET['editar'];	

	
$sql = "UPDATE noticias SET tipo='$tipo', titulo='$titulo', subtitulo='$subtitulo', texto='$texto', data='$novadata', hora='$novahora', autor='$autor', relacionado='$relacionado', img='$img', destaque='$destaque', imgDestaque='$imgDestaque' WHERE id = $editar";


mysqli_query($strcon,$sql) or die("Erro na edição");

mysqli_close($strcon);



//Substitua os valores acima caso não esteje de acordo com sua máquina
//Selecionando o banco de dados...

//

//Inserindo os dados


echo "<p>Notícia ou artigo atualizados com sucesso!</p>";
echo "<br><br>";
echo "<p>Para cadastrar noticias clique <a href='../adicionarNoticia.php'><b>aqui</b>.<a></p>";
?>
	
	
</section>
	
	
</div>	
	
<footer>
	<p>2018 Todos os direitos reservados</p>
</footer>
</main>
</body>
</html>



















