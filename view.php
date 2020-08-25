	<?php 

	include_once 'conexao.php';
	global $result;

	if (isset($_GET['id'])){

		$id = $_GET['id'];

		$sql = "SELECT * FROM publicacao WHERE id = {$id} ";

		if($buscar = mysqli_query($conn,$sql)){
			while ($row = mysqli_fetch_assoc($buscar)){
				$result[] = $row;
			}
			
		}
	}

	?>
	<!DOCTYPE html>
	<html lang="pt-br">
	  <head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>RID - Fatec Ourinhos</title>

		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		

		<script src="assets/js/jquery-2.1.4.min.js"></script>

		  </head>
	  <body>

		<nav class="navbar navbar-default">
		  <div class="container-fluid">
			
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="index.php">
						  </a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav navbar-right">
				<li class="li-login"><a href="index.php" class="login" style="color:#100b0b;" title="Página Inicial"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

		<img alt="Repositório Institucional Digital Fatec Ourinhos" class="img-responsive img" src="assets/img/bg-masthead.jpg">
		<div class="container">
		<p>
		<p>
			

		<h1 class="detalhes">Detalhes:</h1>
		
		<div class="row">
			<div class="col-lg-12 col-md-12 view">


				<?php
					if ($result){	
						foreach ($result as $b){

							echo '
							<div class="row">
								<div class="col-lg-12 col-md-12">
									<div class="col-lg-2 col-md-2"><p class="title">Título:</p></div>
									<div class="col-lg-10 col-md-10"><p>'.$b['titulo'].'</p></div>
								</div>
							</div>';
							
							echo '
							<div class="row">
								<div class="col-lg-12 col-md-12">
									<div class="col-lg-2 col-md-2"><p class="title">Autor(es):</p></div>
									<div class="col-lg-10 col-md-10"><p>'.$b['autores'].'</p></div>
								</div>
							</div>';
							
							echo '
							<div class="row">
								<div class="col-lg-12 col-md-12">
									<div class="col-lg-2 col-md-2"><p class="title">Palavra-chave:</p></div>
									<div class="col-lg-10 col-md-10"><p>'.$b['palavra'].'</p></div>
								</div>
							</div>';
							
							
							echo '
							<div class="row">
								<div class="col-lg-12 col-md-12">
									<div class="col-lg-2 col-md-2"><p class="title">Orientador:</p></div>
									<div class="col-lg-10 col-md-10"><p>'.$b['orientador'].'</p></div>
								</div>
							</div>';
													
							echo '
							<div class="row">
								<div class="col-lg-12 col-md-12">
									<div class="col-lg-2 col-md-2"><p class="title">Ano:</p></div>
									<div class="col-lg-10 col-md-10"><p>'.$b['ano'].'</p></div>
								</div>
							</div>';
							
							echo '
							<div class="row">
								<div class="col-lg-12 col-md-12">
									<div class="col-lg-2 col-md-2"><p class="title">Curso:</p></div>
									<div class="col-lg-10 col-md-10"><p>'.$b['curso'].'</p></div>
								</div>
							</div>';
							
						}
					}
				?>
		

		<hr>
		
		<iframe src="uploads/<?php echo $b['arquivo']; ?>" width="100%" height="300" style="border: none;" download="<?php echo 'RIDFATEC-'.$b['ano'].'-'.$b['id'];?>"></iframe>
		
		<br>
		<hr>
		<div class="col-lg-12 col-md-12 download">
			<a href="uploads/<?php echo $b['arquivo']; ?>" class="btn btn-success btn-lg" target="__blank" download="<?php echo 'RIDFATEC-'.$b['ano'].'-'.$b['id'];?>"><span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span> Download</a>
		</div>

			</div>
		</div>
		
	</div>

		<script src="assets/js/bootstrap.min.js"></script>

	  </body>
	</html>