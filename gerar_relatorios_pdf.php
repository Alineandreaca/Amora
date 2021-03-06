<?php	

	include_once("conexao.php");
	
	$html = '<table border=1';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID</th>';
	$html .= '<th>Nome</th>';
	$html .= '<th>E-mail</th>';
	$html .= '<th>CPF</th>';
	$html .= '<th>RG</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$result_relatorio = "SELECT * FROM usuarios_alunos";
	$resultado_relatorio = mysqli_query($conn, $result_relatorio);
	while($row_relatorios = mysqli_fetch_assoc($resultado_relatorio)){
	$html .= '<tr><td>'.$row_relatorios['id'] . "</td>";
	$html .= '<td>'.$row_relatorios['nome'] . "</td>";
	$html .= '<td>'.$row_relatorios['email'] . "</td>";
	$html .= '<td>'.$row_relatorios['cpf'] . "</td>";
	$html .= '<td>'.$row_relatorios['rg'] . "</td></tr>";		
	}
	
	$html .= '</tbody>';
	$html .= '</table';

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html
		('
		<h1 style="text-align: center;">RID - Relatório de Usuários</h1>
		'. $html .'
			
		');

	//Renderizar o html  
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_usuarios", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>