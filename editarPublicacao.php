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
		$busca->ExeRead("publicacao", "WHERE id = :id", "id={$i}");
		
	}
	
		
if (isset($_POST['titulo'])){	
	
	
		$file = $_FILES['publicacao'];
		if ($file['name']){
			
			
			
						
			
			$upload = new Upload('uploads/');
			$upload->File($file);
			
			//se deu errado
			if ($upload->getError()){
				$texto = $upload->getError();
			}
			//se deu certo
			else {
				unlink("uploads/{$busca->getResult()[0]['arquivo']}");
				
				$dados = [
						'titulo' => $_POST ['titulo'],
						'palavra' => $_POST ['palavra'],
						'ano' => $_POST ['ano'],
						'autores' => $_POST ['autores'],
						'orientador' => $_POST ['orientador'],
						'curso' => $_POST ['curso'],
						'arquivo' => $upload->getResult()
				];
										
				$update = new Update();
				$update->ExeUpdate('publicacao', $dados, "WHERE id = :id", "id={$i}");
					
				if ($update->getResult()){
					
					$resultado = true;
					//echo "{$update->getRowCount()} dados atualizados com sucesso! <hr>";
					//header("Location:editarPesquisa.php?id=$i");
					$busca->ExeRead("publicacao", "WHERE id = :id", "id={$i}");
				
				}
				
			}

			
		} else {
			
			$dados = [
					'titulo' => $_POST ['titulo'],
					'palavra' => $_POST ['palavra'],
					'ano' => $_POST ['ano'],
					'autores' => $_POST ['autores'],
					'orientador' => $_POST ['orientador'],
					'curso' => $_POST ['curso']
			];
								
			$update = new Update();
			$update->ExeUpdate('publicacao', $dados, "WHERE id = :id", "id={$i}");
				
			if ($update->getResult()){
				$resultado = true;
				//echo "{$update->getRowCount()} dados atualizados com sucesso! <hr>";
				//header("Location:editarPesquisa.php?id=$i");
				$busca->ExeRead("publicacao", "WHERE id = :id", "id={$i}");
			
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
        <h1 class="ls-title-intro ls-ico-pencil2">Editar Publicação</h1>
        
        <?php
		if ($resultado){
		
			MSG("Atualizado com sucesso!", RI_MSG_SUCCESS);
		
		} else if ($texto != null) {
			MSG($texto, RI_MSG_DANGER);
		}
		?>

        <form action="editarPublicacao.php?id=<?= $i ?>" name="" method="post"
			enctype="multipart/form-data" class="ls-form ls-form-horizontal row">

			<label class="ls-label col-lg-12 col-xs-12">
		      <b class="ls-label-text">Título:</b>
		      <input type="text" name="titulo" placeholder="Título da Publicação" value="<?php echo $busca->getResult()[0]['titulo']; ?>" class="ls-field" required>
		    </label>

		   		    <label class="ls-label col-lg-12 col-xs-12">
		      <b class="ls-label-text">Ano:</b>
		      <input type="number" name="ano" placeholder="Ex: 2015" value="<?php echo $busca->getResult()[0]['ano']; ?>" class="ls-field" required>
		    </label>

		    <label class="ls-label col-lg-12 col-xs-12">
		      <b class="ls-label-text">Autor(es):</b>
		      <input type="text" name="autores" placeholder="Autor(es)" value="<?php echo $busca->getResult()[0]['autores']; ?>" class="ls-field" required>
		    </label>

		    <label class="ls-label col-lg-12 col-xs-12">
		      <b class="ls-label-text">Orientador:</b>
		      <input type="text" name="orientador" placeholder="Orientador" class="ls-field" value="<?php echo $busca->getResult()[0]['orientador']; ?>" required>
		    </label>

		    <label class="ls-label col-lg-12 col-xs-12">
		      <b class="ls-label-text">Curso</b>
		      <input type="text" name="curso" placeholder="Curso" class="ls-field" value="<?php echo $busca->getResult()[0]['curso']; ?>" required>
		    </label>
			
			 <label class="ls-label col-lg-12 col-xs-12">
		      <b class="ls-label-text">Palavra:</b>
		      <textarea name="palavra" placeholder="Resumo" rows="10" class="ls-field" required><?php echo $busca->getResult()[0]['palavra']; ?></textarea>
		    </label>

		    <label class="ls-label col-lg-12 col-xs-12">
		      <b class="ls-label-text">Arquivo:</b>
		      <input type="file" name="publicacao" accept="application/pdf" class="ls-field">
		    </label>			

			
			<input type="submit" class="ls-btn-primary ls-btn-lg ls-text-uppercase col-lg-4 col-xs-11 col-lg-push-4 botao-p" name="submit" value="Atualizar" />

		</form>
	
	</div>
     
    </main>


  </body>
</html>