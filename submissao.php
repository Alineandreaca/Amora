<?php 

require 'app/Config.inc.php';

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
				'autores' => $_POST ['autores'],
				'orientador' => $_POST ['orientador'],
				'ano' => $_POST ['ano'],
				'palavra' => $_POST ['palavra'],
				'curso' => $_POST ['curso'],
				'arquivo' => $upload->getResult(),
				'aprovado' => 'N',
				
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
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Repositório Institucional - Fatec Ourinhos</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/repositorio.css" rel="stylesheet">

    <script src="assets/js/jquery-2.1.4.min.js"></script>

    
  </head>
  <body>

	  <nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="index.php">
		      	<img alt="Repositório Institucional Fatec Ourinhos" class="img-responsive img" src="assets/img/bg-masthead.jpg">
		      </a>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right">
		      	<li class="nav-item"><a class="nav-link js-scroll-trigger" href="gerar_pdf.php">Termo de autoarquivamento para impressão</a></li>
		        <li class="li-login"><a href="Cliente.php" class="login" title="Área do Aluno"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Login</a></li>
		        
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

		<div class="container abc">
		
			<?php
			if ($resultado){
			
				MSG("Cadastrado com sucesso!", RI_MSG_SUCCESS);
			
			} else if ($texto != null) {
				MSG($texto, RI_MSG_DANGER);
			}
			?>

			<div class="alert alert-info">
				<p>Obs.: Para disponibilizar sua produção científica no Repositório deve-se submeter  o artigo através deste formulário. Onde o mesmo deverá ser aprovado pelo administrador do sistema.</p>
				<hr>
				<p>Requisito para submissão:</p>
				<p>I - O formato do arquivo deve ser .PDF</p>
				<p>II - O arquivo não deve exceder o tamanho máximo de 5mb</p>
				<p>III - Todos os campos são obrigatórios</p>
			</div>
			
			<div class="row">
				<div class="text-center">
						<h2>Submeter Artigo Científico</h2>
				</div>
		
				<div class="col-md-12 col-lg-12 border-form">
					<form action="" method="post" enctype="multipart/form-data">
		
						<div class="form-group col-lg-12 col-md-12">
					    	<label class="" for="">Título <span class="requisito">*</span>:</label>
							<input type="text" class="form-control inp br" name="titulo" placeholder="Título da Publicação" required>
						</div>
			
						<div class="form-group col-lg-12 col-md-12">
					    	<label class="" for="">Autor(es) <span class="requisito">*</span>:</label>
							<input type="text" class="form-control inp br" name="autores" placeholder="Autor(es)" required>
						</div>
						
						<div class="form-group col-lg-12 col-md-12">
					    	<label class="" for="">Orientador <span class="requisito">*</span>:</label>
							<input type="text" class="form-control inp br" name="orientador" placeholder="Orientador" required>
						</div>
						
						<div class="form-group col-lg-6 col-md-6">
					    	<label class="" for="">Ano <span class="requisito">*</span>:</label>
							<input type="number" class="form-control inp br" name="ano" placeholder="Ex: 2015" required>
						</div>
						
						<div class="form-group col-lg-6 col-md-6">
					    	<label class="" for="">Curso <span class="requisito">*</span>:</label>
							<input type="text" class="form-control inp br" name="curso" placeholder="Curso" required>
						</div>
						<div class="form-group col-lg-12 col-md-12">
					    	<label class="" for="">Palavras-Chaves <span class="requisito">*</span>:</label>
					    	<textarea name="palavra" placeholder="Digite três palavras-chaves" rows="10" class="form-control ta br" required></textarea>
						</div>
						
						<div class="form-group col-lg-12 col-md-12">
					    	<label class="" for="">Arquivo <span class="requisito">*</span>:</label>
							<input type="file" class="form-control inp br" name="publicacao" accept="application/pdf" required>
						</div>
								
						<div class="form-group col-lg-4 col-md-4 col-lg-push-4 col-md-push-4">
							<input type="submit" class="btn btn-danger btn-lg btn-block" name="submit" value="Submeter">
						</div>
		
					</form>
		
				</div>
			</div>
		
		</div>

			
    	<script src="assets/js/bootstrap.min.js"></script>

	</body>
</html>