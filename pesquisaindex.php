	<?php 

	include_once 'conexao.php';

	$resultado = true;
		$result=null;
		$form= filter_input_array(INPUT_POST, FILTER_DEFAULT);
		if($form && $form['submit']){
			if (isset($form['submit'])){
				if (!$_POST['busca']){
					echo '<div class="alert alert-warning" role="alert">
						Digite um termo para pesquisar!
					</div>';
				}
				else if ($_POST['busca']){
					$busca = $_POST['busca'];
					$tipo = $_POST['tipo'];
					$sql = "SELECT * FROM publicacao WHERE {$tipo} LIKE \"%{$busca}%\" ";
					if($buscar = mysqli_query($conn,$sql)){
						while ($row = mysqli_fetch_assoc($buscar)){
							$result[] = $row;
						}
					}
					if(!$result){
						$resultado = false;
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
		
		<title>RID - Fatec Ourinhos</title>

		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	  
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
		<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

	  
		<script type="text/javascript">
		
			$(document).ready(function() {

				$('#tb1').dataTable({
					
					// "bJQueryUI": true,
					// "sPaginationType": "full_numbers",
					// "sDom": '<"H"Tlfr>t<"F"ip>',
					"oLanguage": {
						"sLengthMenu": "Registros/Página _MENU_",
						"sZeroRecords": "Nenhum registro encontrado",
						"sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
						"sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
						"sInfoFiltered": "(filtrado de _MAX_ registros)",
						"sSearch": "Pesquisar: ",
						"oPaginate": {
							// "sFirst": " Primeiro ",
							"sPrevious": " Anterior ",
							"sNext": " Próximo ",
							// "sLast": " Último "
						}
					},
					"aaSorting": [[0, 'desc']],
					"aoColumnDefs": [ {"sType": "num-html", "aTargets": [0]} ]
				});

			});
		</script>

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
							</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav navbar-right">
				<li class="li-login"><a href="index.php" class="login" style="color:#100b0b;" title="Página Inicial"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
			  
			<img alt="Repositório Institucional Fatec Ourinhos" class="img-responsive img" src="assets/img/bg-masthead.jpg">

			<div class="container abc">
			
			<?php 
			$get = filter_input(INPUT_GET, 'exe', FILTER_DEFAULT);
			if (!empty($get)){
				if ($get == 'restrito'){
					MSG('Acesso negado: Por favor efetue login para acessar o Painel!', RI_MSG_DANGER);
				}
				else if($get == 'logoff') {
					MSG('Sucesso ao deslogar: Sua sessão foi finalizada. Volte sempre!', RI_MSG_SUCCESS);
				}
			}
			?>
			
				<div class="row text-center">
					<h1>Repositório Institucional Digital Fatec Ourinhos</h1>
			
					<div class="col-md-12 col-lg-12 c">
						<form action="pesquisaindex.php" method="post" enctype="multipart/form-data" style="background-color:;">
			
							<div class="form-group col-sm-7">
								<label class="sr-only" for="">Digite um termo para busca</label>
								<input type="search" class="form-control inp" name="busca" id="" placeholder="Digite um termo para pesquisar..." required>
							</div>
					
							<div class="form-group col-lg-3 col-md-3">
								<select class="form-control inp" name="tipo">
									<option value="curso">Curso</option>
									<option value="titulo" selected>Título</option>
									<option value="autores">Autor</option>
									<option value="orientador">Orientador</option>
									<option value="palavra">Palavras-chave</option>
									<option value="ano">Ano</option>
								</select>
							</div>
			
							<div class="form-group col-lg-2 col-md-2">
								<input type="submit" class="btn btn-danger  btn-block btn" name="submit" value="Pesquisar">
							</div>
			
						</form>
			
					</div>
				</div>
			
				<div class="container p-0">
			<?php
				if (!$resultado){
					
					echo '<div class="alert alert-warning" role="alert">
						Nenhum artigo localizado com o termo: <b>'.$busca.'</b>
					</div>';
				}
				else if(isset($result)) {
					
					echo '
					<hr>
					<div class="col-lg-12 col-md-12 contorno-table">
						<table class="ls-table a ls-bg-header ls-table-striped ls-table-bordered display" cellspacing="0" cellpadding="0" border="0" id="tb1">
							<thead>
								<th>Ano</th>
								<th>Título</th>
								<th>Autor (es)</th>
								<th>Detalhes</th>
							</thead>
							<tbody>';
							
								foreach ($result as $r){
									echo '<tr>';
										echo '<td>'.$r['ano'].'</td>';
										echo '<td>'.$r['titulo'].'</td>';
										echo '<td>'.$r['autores'].'</td>';
										echo '<td style="text-align:center;"><a href="view.php?id='.$r['id'].'" class="btn bt-visualizar" title="Visualizar"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></td>';
									echo '</tr>';
								
										}
						echo '			
							</tbody>
						</table>
					</div>';	
					
				}
			?>
		</div>
			</div>

					
			<script src="assets/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

		</body>
	</html>