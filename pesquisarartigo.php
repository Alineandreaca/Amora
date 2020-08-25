<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "repo_login";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	$pesquisar = $_POST['pesquisar'];
	$result_artigos = "SELECT * FROM artigos WHERE autor LIKE '%$pesquisar%' LIMIT 15";
	$resultado_artigos = mysqli_query($conn, $result_artigos);
	
	while($rows_artigos = mysqli_fetch_array($resultado_artigos)){
		
		echo "Obra encontrada: ".$rows_artigos['autor'].".".$rows_artigos['titulo']."<br>";
	}
?>