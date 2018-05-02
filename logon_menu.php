	
	<div id="logo_topo">
	
		<img src="img/logosite.png" alt="">
		
		<h6>Portal Administrativo CineSuper</h6>
		
	</div>

	
	
			<?php
	if(isset($_SESSION['aberta'])) {	// Verifica se usuário já está logado			
		include("config/conectar.php");					
		echo "<p>" . $_SESSION['nome'] . "</p>";
		
	//MENU	
		echo "<nav class='menu'>
				 <ul>

					 <li><a href='index.php'>Home</a></li>

					 <li><a href='verFilmes.php'>Filmes</a></li>

					 <li><a href='verNoticias.php?ordem=ASC'>Notícias e artigos</a></li>
					 
					 <li><a href='config/logout.php'>Sair</a></li>

				 </ul>
			</nav>";	
	}
	else { // Se não estiver logado, pede para logar ou cadastrar usuário
		echo "Efetue login abaixo para cadastrar conteúdo no site<br>";
		echo "<a href='login.php' class='button'>Login</a><br><br>";
		echo "Ou então cadastre-se no sistema:<br>";
		echo "<a href='registrar.php' class='button'>Cadastrar-se</a>";
	}
	?>
