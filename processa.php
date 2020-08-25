	<?php
	session_start();
	include_once('conexao.php');

	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
	$rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
	$niveis_acesso_id = filter_input(INPUT_POST, 'niveis_acesso_id', FILTER_SANITIZE_STRING);
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$select_niveis_acesso = $_POST['select_niveis_acesso'];


	$result_usuario = "INSERT INTO usuarios_alunos (nome, email, cpf, rg,  niveis_acesso_id, telefone,senha,created) VALUES 
	('$nome','$email','$cpf','$rg','$select_niveis_acesso','$telefone','$senha', NOW())";
	$resultado_usuario = mysqli_query($conn, $result_usuario);

	if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = "<p style='color:white;'>Usuário cadastrado com sucesso.</p>";
		header("Location: index.php");
	}else{
		$_SESSION['msg'] = "<p style='color:white;'>Usuário não foi cadastrado com sucesso. Tente de novo!</p>";
		header("Location: cadastra.php");
		
	}
	?>