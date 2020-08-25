<?php 	
	session_start();
	require 'app/Config.inc.php';
	$login = new Login();
	
	if (!$login->CheckLogin()){
		unset($_SESSION['userlogin']);
		header('Location: index.php?exe=restrito');
	
	}
	else{
		$userLogin = $_SESSION['userlogin'];
	}
	
	$resultado = false;
	$texto = null;
	
	
	if (isset($_GET['id'])){
		
		$i = $_GET['id'];
		
		$busca = new Read();
		$busca->ExeRead("usuarios_alunos", "WHERE id = :id", "id={$i}");
		
	}
	// Carrega os dados do banco pra tela
	if (isset($_POST['nome'])){
		
					$dados=[
						'nome' => $_POST['nome'],
						'email' => $_POST['email'],
						'telefone' => $_POST['telefone'],
						'cpf' => $_POST['cpf'],
						'senha' => $_POST['senha'],
						'rg' => $_POST['rg'],				
				
				];
		// Realiza a atualização no da tela pro banco 					
				$update = new Update();
				$update->ExeUpdate('usuarios_alunos', $dados, "WHERE id = :id", "id={$i}");
					
				if ($update->getResult()){
					
					$resultado = true;
					
					$busca->ExeRead("usuarios_alunos", "WHERE id = :id", "id={$i}");
				
				}
			
				
		 else {
			
			$dados=[
					'nome' => $_POST['nome'],
					'email' => $_POST['email'],
					'telefone' => $_POST['telefone'],
					'cpf' => $_POST['cpf'],
					'senha' => $_POST['senha'],
					'rg' => $_POST['rg'],
						
			];
						
			$update = new Update();
			$update->ExeUpdate('usuarios_alunos', $dados, "WHERE id = :id", "id={$i}");
			
			if ($update->getResult()){
				
				$resultado = true;
				
				$busca->ExeRead("usuarios_alunos", "WHERE id = :id", "id={$i}");
				
			}
	
		}
	}
	
?>



<!DOCTYPE html>
<html class="ls-theme-gray">
  <head>
    <title>RID - Fatec Ourinhos</title>

    <?php require_once('assets.php');?>
     
  </head>
  <body>

    <?php require_once('header.php');?>

    <?php require_once('aside.php');?>

    <main class="ls-main ">
      <div class="container-fluid">
        <h1 class="ls-title-intro ls-ico-pencil2">Editar dados do aluno</h1>
        
        <?php
		if ($resultado){
		
			MSG("Atualizado com sucesso!", RI_MSG_SUCCESS);
		
		} else {
			MSG($texto, RI_MSG_DANGER);
		}
		?>

        <form action="editarUsuario.php?id=<?= $i ?>" name="edPesquisa" method="post" enctype="multipart/form-data" class="ls-form ls-form-horizontal row">
		

			<label class="ls-label col-lg-12 col-xs-12">
			      <b class="ls-label-text">Nome:</b>
			      <input type="text" name="nome" placeholder="Nome completo" value="<?php echo $busca->getResult()[0]['nome']; ?>" class="ls-field" required>
			    </label>

			     <label class="ls-label col-lg-6 col-xs-12">
			      <b class="ls-label-text">E-mail</b>
			      <input type="text" name="email" placeholder="E-mail" class="ls-field" value="<?php echo $busca->getResult()[0]['email']; ?>" required>
			    </label>

			    <label class="ls-label col-lg-6 col-xs-12">
			      <b class="ls-label-text">CPF:</b>
			      <input type="text" name="cpf" placeholder="Número do CPF" class="ls-field" value="<?php echo $busca->getResult()[0]['cpf']; ?>" required>
			    </label>

			    <label class="ls-label col-lg-6 col-xs-12">
			      <b class="ls-label-text">RG:</b>
			      <input type="text" name="rg" placeholder="Número do RG" class="ls-field" value="<?php echo $busca->getResult()[0]['rg']; ?>" required>
			    </label>

			    <label class="ls-label col-lg-6 col-xs-12">
			      <b class="ls-label-text">Telefone:</b>
			      <input type="text" name="telefone" placeholder="Número do telefone" class="ls-field" value="<?php echo $busca->getResult()[0]['telefone']; ?>" required>
			    </label>

			    <label class="ls-label col-lg-12 col-xs-12">
			      <b class="ls-label-text">Senha:</b>
			      <input type="text" name="senha" placeholder="Senha" class="ls-field" value="<?php echo $busca->getResult()[0]['senha']; ?>" required>
			    </label>

			    

				<input type="submit" class="ls-btn-primary ls-btn-lg ls-text-uppercase col-lg-4 col-xs-11 col-lg-push-4 botao-p" name="submit" value="Atualizar" />

		</form>
		
	
	</div>
     
    </main>

   </body>
</html>