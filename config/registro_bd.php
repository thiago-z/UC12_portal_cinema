<?php
		
		$strcon = mysqli_connect("localhost", "root", "root", "portal_cinema");

if (!$strcon){
	die("Não foi possivel conectar ao servidor!");
}
		
		
		//captura os dados fornecidos pelo user e grava em variaveis:
		
		if(isset($_POST['submit'])) {
			
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$usuario = $_POST['usuario'];
			$senha = $_POST['senha'];
		
		
		//verifica se o user preencheu os campos corretamente:
		if ($nome == '' || $senha == '' || $usuario == '' || $email == '') {
			echo "Todos os campos devem estar preenchidos!<br>";
			echo "<a href='registrar.php'>Registrar-se</a>";
		}else {
		
		
		//Criando hash da senha fornecida pelo user(criptografa):
		$hashsenha = password_hash($senha, PASSWORD_DEFAULT);
		
		//CNECTAR AO bd E INSERIR DADOS CADASTRADOS:
		
			
		$sql = "INSERT INTO login (nome, email, usuario, senha) VALUES ('$nome', '$email', '$usuario', '$hashsenha')";


		mysqli_query($strcon,$sql) or die("Não é possivel executar a ação solicitada!");
			
			
			
		mysqli_query($strcon, "INSERT INTO login (nome, email, usuario, senha) VALUES ('$nome', '$email', '$usuario', '$hashsenha')")
			or die("Não é possivel executar a ação solicitada!");
		
		echo "Cadastro efetuado com sucesso!<br>
			 <a href='login.php'>Logar-se</a>";
		
		}}else{
		
	
	?>