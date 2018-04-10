
	<h6>Sistema de cadastro</h6>
		<br>
		<br>

	
			<?php
	if(isset($_SESSION['aberta'])) {	// Verifica se usuário já está logado			
		include("config/conectar.php");					
		echo "<p>" . $_SESSION['nome'] . "</p>";
		include("menu.php");	
	}
	else { // Se não estiver logado, pede para logar ou cadastrar usuário
		echo "Efetue login abaixo para cadastrar conteúdo no site<br>";
		echo "<a href='login.php' class='button'>Login</a><br><br>";
		echo "Ou então cadastre-se no sistema:<br>";
		echo "<a href='registrar.php' class='button'>Cadastrar-se</a>";
	}
	?>