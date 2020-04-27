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
	
	$readPesquisa = new Read();
	$readPesquisa->FullRead('SELECT COUNT(*) FROM pesquisa');

	
	$readPublicacao = new Read();
	$readPublicacao->FullRead('SELECT COUNT(*) FROM publicacao WHERE aprovado = :aprovado', "aprovado=S");
	
	$readExtensao = new Read();
	$readExtensao->FullRead('SELECT COUNT(*) FROM extensao');
		
?>
<!DOCTYPE html>
<html class="ls-theme-red ls-html-nobg">
  <head>
    <title>Repositório Institucional - Fatec Ourinhos</title>

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

<!-- ----------------- -->
<div class="ls-box ls-board-box">
  <header class="ls-info-header">
    <h2 class="ls-title-3">Relatório total</h2>
    <!-- <a href="/locawebstyle/documentacao/exemplos/painel2/stats" class="ls-btn ls-btn-sm">Ver relatórios</a> -->
  </header>

  <div id="sending-stats" class="row ls-clearfix">
    <div class="col-sm-12 col-md-4 col-lg-4">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4">Usuários</h6>
        </div>
        <div class="ls-box-body">
          <span class="ls-board-data">
            <strong class="ls-color-theme"><?php echo $readPesquisa->getResult()[0]['COUNT(*)']; ?></strong>
          </span>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4">
      <div class="ls-box">
        <div class="ls-box-head">
          
          <h6 class="ls-title-4">Artigos científicos</h6>
        </div>
        <div class="ls-box-body">
          <span class="ls-board-data">
            <strong class="ls-color-theme"><?php echo $readPublicacao->getResult()[0]['COUNT(*)']; ?></strong>
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