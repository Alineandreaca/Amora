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
	
	$mensagem = '';
	$tipo = '';
	$excluir = '';
	$excluirTipo = '';
	
	$read = new Read();
	$resultado = true;
	
	$form= filter_input_array(INPUT_POST, FILTER_DEFAULT);
	if($form && $form['submit']){
		
		if (isset($form['submit'])){
		
			if ((!$_POST['nome']) && (!$_POST['email']) && (!$_POST['cpf'])){
				
				$mensagem = "Informe um dos campos para pesquisar!";
				$tipo = RI_MSG_DANGER;
			
			} 
			
						else if (($_POST['nome'])){
				//echo "Nome do aluno";
				
				//$read = new Read();
				$read->FullRead("SELECT * FROM usuarios_alunos WHERE nome LIKE :like", "like={$_POST['nome']}%");
								
				if(!$read->getResult()){
					$resultado = false;
				}
				
			}
			else if (($_POST['email'])){
				//echo "E-mail";

				//$read = new Read();
				$read->FullRead("SELECT * FROM usuarios_alunos WHERE email LIKE :like", "like=%{$_POST['email']}%");
				
				if(!$read->getResult()){
					$resultado = false;
				}
				
			}
			else if (($_POST['cpf'])){
				//echo "Autores";
				
				//$read = new Read();
				$read->FullRead("SELECT * FROM usuarios_alunos WHERE cpf LIKE :like", "like=%{$_POST['cpf']}%");
				
				if(!$read->getResult()){
					$resultado = false;
				}
				
			}
		
		}
		
		
	}
		
	if (isset($_GET['e'])){
		
		$e = $_GET['e'];
		
		
		$delete = new Delete();
		$delete->ExeDelete('usuarios_alunos', 'WHERE id= :id', "id={$e}");
		
		
		if ($delete->getResult()){

			$excluir = 'Removido com sucesso!';
			$excluirTipo = RI_MSG_SUCCESS;			

		}
				
	}
	
	
	
	
?>
<!DOCTYPE html>
<html class="ls-theme-gray">
  <head>
    <title>RID-Fatec Ourinhos</title>

    <?php require_once('assets.php');?>

    <script src="assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

    <script type="text/javascript">
		function confirmar(){
			var x = confirm("Deseja realmente excluir?");
			if(x == true){
				return true;
			}
			else {
				return false;
			}
		}
	</script>

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

    <?php require_once('header.php');?>

    <?php require_once('aside.php');?>

    <main class="ls-main ">
      <div class="container-fluid">
        <h1 class="ls-title-intro ls-ico-search">Pesquisar usuários alunos</h1>
        
        <?php MSG('Informe apenas um dos campos para pesquisar', RI_MSG_WARNING) ?>		
	
	<form action="listaUsuario.php" name="cadPesquisa" method="post" enctype="multipart/form-data" class="ls-form ls-form-horizontal row">
		
		<label class="ls-label col-lg-12 col-xs-12">
	      <b class="ls-label-text">Nome do aluno:</b>
	      <input type="text" name="nome" placeholder="Nome do aluno" class="ls-field">
	    </label>

		<label class="ls-label col-lg-12 col-xs-12">
	      <b class="ls-label-text">E-mail:</b>
	      <input type="email" name="email" placeholder="E-mail" class="ls-field">
	    </label>
	 
	    <label class="ls-label col-lg-12 col-xs-12">
	      <b class="ls-label-text">CPF:</b>
	      <input type="text" name="cpf" placeholder="cpf" class="ls-field">
	    </label>

		
		<input type="submit" class="ls-btn-primary ls-btn-lg ls-text-uppercase col-lg-4 col-xs-11 col-lg-push-4 botao-pesq" name="submit" value="Pesquisar" />

	</form>
	
	<div class="col-lg-12 col-xs-12">
		<?php 
		if ($mensagem != ''){
			MSG($mensagem, $tipo);
			$excluir = '';
			$excluirTipo = '';
		}
	    ?>
	</div>
		
	<div class="col-lg-12 col-xs-12">
		<?php 
		if ($excluirTipo != ''){
			MSG($excluir, $excluirTipo);
			$mensagem = '';
			$tipo = '';
		}
		?>
	</div>
	
	<div class="col-lg-12 col-xs-12">
		<?php 
		if (!$resultado){
				
			MSG("Nenhum resultado encontrado!", RI_MSG_DANGER);
		
		}
		?>
	</div>	
	<hr>
	
	<?php
		if ($read->getResult()){

	echo '
	<table class="ls-table ls-bg-header ls-table-striped ls-table-bordered display" cellspacing="0" cellpadding="0" border="0" id="tb1">
		<thead>
			<th>Aluno</th>
			<th>E-mail</th>
			<th>CPF</th>
			<th>Operações</th>
		</thead>
		<tbody>';
				
					foreach ($read->getResult() as $p){
						echo '<tr>';
							echo '<td style="text-align:justify;">'.$p['nome'].'</td>';
							echo '<td style="text-align:center;">'.$p['email'].'</td>';
							echo '<td style="text-align:center;">'.$p['cpf'].'</td>';
							echo '<td style="text-align:center;"><a href="editarUsuario.php?id='.$p['id'].'" class="ls-btn ls-ico-edit-admin bt-editar" title="Editar"></a>
									  <a onclick="return confirmar();" href="listaUsuario.php?e='.$p['id'].'" class="ls-btn ls-ico-remove bt-deletar-reprovar" title="Excluir"></a>
								 </td>';
						echo '</tr>';
					
					}
	echo '			
		</tbody>
	</table>';

		}
	?>
	
	</div>
   
    </main>

  </body>
</html>