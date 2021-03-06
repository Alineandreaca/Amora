<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Usuários listados</title>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			$('#listar-usuarios').DataTable({			
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "proc_pesq_user.php",
					"type": "POST"
				}
			});
		} );
		</script>
	</head>
	<body>
		<h1>Listar Usuários</h1>
		<table id="listar-usuarios" class="display" style="width:100%">
			<thead>
				<tr>
					<th>Nome</th>
					<th>CPF</th>
					<th>RG</th>
					<th>E-mail</th>
					<th>Senha</th>
					<th>Nível de Acesso</th>
					<th>Telefone</th>
					</tr>
			</thead>
		</table>		
	</body>
</html>
