<?php
	session_start();
	
	unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioNome'],
		$_SESSION['usuarioNiveisAcessoId'],
		$_SESSION['usuarioEmail'],
		$_SESSION['usuarioSenha']
	);
	
		$_SESSION['logindeslogado'] = "<div class='alert alert-success'>Deslogado com sucesso!</div>";
	//redirecionar o usuario para a página de login
	header("Location: index.php");
?>