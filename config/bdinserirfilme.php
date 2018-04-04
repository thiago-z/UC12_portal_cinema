<?php

//conectar ao banco de dados
include 'conectar.php';


//Vamos definir as variáveis de data e hora
//para inserção no banco de dados


//vamos criar uma variável especial para a querie sql	
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


$sql = "INSERT INTO filmes (nome, nomeOriginal, estreia, duracao, genero, paisOrigem, diretor, elenco, sinopse, poster, emCartaz) VALUES ('$nome', '$nomeOriginal', '$estreia', '$duracao', '$genero', '$paisOrigem', '$direcao', '$elenco', '$sinopse', '$imgPoster', '$cartaz')";


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