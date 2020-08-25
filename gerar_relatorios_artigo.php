<?php	

	include_once("conexao.php");
	
	$html = '<table border=1';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID</th>';
	$html .= '<th>Autores</th>';
	$html .= '<th>Título</th>';
	$html .= '<th>Orientador</th>';
	$html .= '<th>Curso</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$result_relatorio_artigo = "SELECT * FROM publicacao";
	$resultado_relatorio = mysqli_query($conn, $result_relatorio_artigo);
	while($row_relatorios = mysqli_fetch_assoc($resultado_relatorio)){
	$html .= '<tr><td>'.$row_relatorios['id'] . "</td>";
	$html .= '<td>'.$row_relatorios['autores'] . "</td>";
	$html .= '<td>'.$row_relatorios['titulo'] . "</td>";
	$html .= '<td>'.$row_relatorios['orientador'] . "</td>";
	$html .= '<td>'.$row_relatorios['curso'] . "</td></tr>";		
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
		<h1 style="text-align: center;">RID - Relatório de Artigos</h1>
		'. $html .'
			
		');

	//Renderizar o html  
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_artigos", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>