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
		
		$readUsuario = new Read();
		$readUsuario->FullRead('SELECT COUNT(*) FROM usuarios_alunos');

		$readPublicacao = new Read();
		$readPublicacao->FullRead('SELECT COUNT(*) FROM publicacao WHERE aprovado = :aprovado', "aprovado=S");
		
		$readPublicacao1 = new Read();
		$readPublicacao1->FullRead('SELECT COUNT(*) FROM publicacao WHERE aprovado = :aprovado', "aprovado=N");
		
					
	?>
	<!DOCTYPE html>
	<html class="ls-theme-gray ls-html-nobg">
	  <head>
		<title>RID - Fatec Ourinhos</title>

		<?php require_once('assets.php');?>
		<script type="text/javascript" src="assets/js/chartist.min.js"></script>
		<link href="assets/css/chartist.min.css" rel="stylesheet" type="text/css">
		
	  </head>
	  <body>

		<?php require_once('header.php');?>

		<?php require_once('aside.php');?>

		<main class="ls-main ">
		  <div class="container-fluid">
			<h1 class="ls-title-intro ls-ico-dashboard">Painel de controle</h1>

	<div class="ls-box ls-board-box">
	  <header class="ls-info-header">
		<h2 class="ls-title-3">Relatório total</h2>
		 </header>

	  <div id="sending-stats" class="row ls-clearfix">
		<div class="col-sm-12 col-md-4 col-lg-4">
		  <div class="ls-box">
			<div class="ls-box-head">
			  <h6 class="ls-title-4">Usuários cadastrados</h6>
			</div>
			<div class="ls-box-body">
			  <span class="ls-board-data">
				<strong class="ls-color-theme"><?php echo $readUsuario->getResult()[0]['COUNT(*)']; ?></strong>
			  </span>
			</div>
		  </div>
		</div>

		<div class="col-sm-12 col-md-4 col-lg-4">
		  <div class="ls-box">
			<div class="ls-box-head">
			  
			  <h6 class="ls-title-4">Artigos científicos aprovados</h6>
			</div>
			<div class="ls-box-body">
			  <span class="ls-board-data">
				<strong class="ls-color-theme"><?php echo $readPublicacao->getResult()[0]['COUNT(*)']; ?></strong>
			  </span>
			</div>
		  </div>
		</div>
		
		<div class="col-sm-12 col-md-4 col-lg-4">
		  <div class="ls-box">
			<div class="ls-box-head">
			  
			  <h6 class="ls-title-4">Artigos científicos aguardando aprovação</h6>
			</div>
			<div class="ls-box-body">
			  <span class="ls-board-data">
				<strong class="ls-color-theme"><?php echo $readPublicacao1->getResult()[0]['COUNT(*)']; ?></strong>
			  </span>
			</div>
		  </div>
		</div>

	  </div>
	  <hr class="ls-no-border">
	  <div id="panel-charts-2" class="ls-clear-both"></div>
	</div>

	   </div>
			 
		<?php require_once('assets-footer.php');?>

	  </body>
	</html>