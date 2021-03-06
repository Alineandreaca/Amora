﻿<?php
session_start ();
require 'app/Config.inc.php';
$login = new Login ();

if (! $login->CheckLogin ()) {
	unset ( $_SESSION ['userlogin'] );
	header ( 'Location: index.php?exe=restrito' );
} else {
	$userLogin = $_SESSION ['userlogin'];
}

$resultado = false;
$texto = null;

$form = filter_input_array ( INPUT_POST, FILTER_DEFAULT );
if ($form && $form ['submit']) {
	
	$file = $_FILES ['publicacao'];
	if ($file ['name']) {
		$upload = new Upload ( 'uploads/' );
		$upload->File ( $file );
		
		if ($upload->getError()){
			$texto = $upload->getError();
		}
		
		$dados = [ 
				'titulo' => $_POST ['titulo'],
				'ano' => $_POST ['ano'],
				'autores' => $_POST ['autores'],
				'orientador' => $_POST ['orientador'],
				//'arquivo' => $upload->getName(),
				'arquivo' => $upload->getResult(),
				'aprovado' => 'S',
				'curso' => $_POST ['curso'] ,
				'palavra' => $_POST ['palavra']
		];
		
		if($upload->getResult()){		
			$cadastra = new Create ();
			$cadastra->ExeCreate ( 'publicacao', $dados );
			
			if ($cadastra->getResult ()) {
				$resultado = true;
			}
					
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
        <h1 class="ls-title-intro ls-ico-plus">Cadastro de Publicação</h1>

		<?php
		if ($resultado){
		
			MSG("Cadastrado com sucesso!", RI_MSG_SUCCESS);
		
		} else if ($texto != null) {
			MSG($texto, RI_MSG_DANGER);
		}
		?>
		
		<?php MSG('Todos os campos são obrigatórios!', RI_MSG_INFO) ?>

		<form action="" name="cadExtensao" method="post"
			enctype="multipart/form-data" class="ls-form ls-form-horizontal row">

			<label class="ls-label col-lg-12 col-xs-12">
		      <b class="ls-label-text">Título:</b>
		      <input type="text" name="titulo" placeholder="Título da Publicação" class="ls-field" required>
		    </label>

		       <label class="ls-label col-lg-12 col-xs-12">
		      <b class="ls-label-text">Ano:</b>
		      <input type="number" name="ano" placeholder="Ex: 2015" class="ls-field" required>
		    </label>

		    <label class="ls-label col-lg-12 col-xs-12">
		      <b class="ls-label-text">Autor(es):</b>
		      <input type="text" name="autores" placeholder="Autor(es)" class="ls-field" required>
		    </label>

		    <label class="ls-label col-lg-12 col-xs-12">
		      <b class="ls-label-text">Orientador:</b>
		      <input type="text" name="orientador" placeholder="Orientador" class="ls-field" required>
		    </label>

		    <label class="ls-label col-lg-12 col-xs-12">
		      <b class="ls-label-text">Curso</b>
		      <input type="text" name="curso" placeholder="Curso" class="ls-field" required>
		    </label>
			
			<label class="ls-label col-lg-12 col-xs-12">
		      <b class="ls-label-text">Palavras-chaves:</b>
		      <textarea name="palavra" placeholder="Três palavras-chaves" rows="10" class="ls-field" required></textarea>
		    </label>

		    <label class="ls-label col-lg-12 col-xs-12">
		      <b class="ls-label-text">Arquivo:</b>
		      <input type="file" name="publicacao" accept="application/pdf" class="ls-field" required>
		    </label>			

			<input type="submit" class="ls-btn-primary ls-btn-lg ls-text-uppercase col-lg-4 col-xs-11 col-lg-push-4 botao-p" name="submit" value="Cadastrar" />
			
		</form>
	
	</div>
      
    </main>
  </body>
</html>