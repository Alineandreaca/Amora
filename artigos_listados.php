<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Artigos listados</title>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			$('#listar-artigos').DataTable({			
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "proc_pesq_art.php",
					"type": "POST"
				}
			});
		} );
		</script>
	</head>
	<body>
		<h1>Listar Artigos</h1>
		<table id="listar-artigos" class="display" style="width:100%">
			<thead>
				<tr>
					<th>Autor</th>
					<th>Titulo</th>
					<th>Orientador</th>
					<th>Curso</th>
					<th>Ano</th>
					<th>Palavra-chave</th>
					</tr>
			</thead>
		</table>		
	</body>
</html>
