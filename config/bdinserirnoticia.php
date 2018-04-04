<?php

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
$autor = $_POST["autor"];
$relacionado = $_POST["relacionado"];
$img = $_POST["img"];
$destaque = $_POST["destaque"];
$imgDestaque = $_POST["imgDestaque"];


$sql = "INSERT INTO noticias (tipo, titulo, subtitulo, texto, data, hora, autor, relacionado, img, destaque, imgDestaque) VALUES ('$tipo', '$titulo', '$subtitulo', '$texto',  '$novadata', '$novahora', '$autor', '$relacionado', '$img', '$destaque', '$imgDestaque')";


mysqli_query($strcon,$sql) or die("Erro no cadastro");

mysqli_close($strcon);



//Substitua os valores acima caso não esteje de acordo com sua máquina
//Selecionando o banco de dados...

//

//Inserindo os dados


echo "<h1>Filme cadastrado com sucesso!</h1>";
echo "<br><br>";
echo "<p>Para cadastrar outro filme clique <a href='../index.php'><b>aqui</b>.<a></p>";
?>