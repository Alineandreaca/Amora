<?php	

	include_once("conexao.php");
	
	
	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html
		('
		<div style="text-align: center;">
		<img src="assets/img/bg-masthead.jpg" />
		<h3 >TERMO DE AUTORIZAÇÃO - DEPÓSITO E DISPONIBILIZAÇÃO 
		DE TRABALHOS ACADÊMICOS NO RID- FATEC OURINHOS</h3>
		<div>
	<div style="text-align: justify;"><p>
Eu , _________________________________________________, RG___________________________, 
CPF_______________________, aluno do curso _______________________________, autor do artigo científico
_____________________________________________________________ orientado por__________________________________ 
no ano de ________________concordo que meu trabalho de conclusão de curso seja disponibilizada no Repositório 
Institucional da Faculdade Tecnologia de Ourinhos(FATEC Ourinhos) nas seguintes condições: 
Declaro que este arquivo é a versão final do 
trabalho em suporte digital, confirmada pelo orientador mediante assinatura abaixo, aprovada após a realização
 de defesa pública, e, quando for o caso, após as correções sugeridas pela banca. Declaro que o trabalho entregue
 é original, não infringe direitos de qualquer outra pessoa e que contendo material do qual não detenho direitos 
 de autor, obtive autorização prévia do detentor dos referidos direitos para conceder à FATEC os termos requeridos
 por esta licença. 
Estou ciente de que o depósito da produção intelectual preserva os direitos do autor e, dessa forma, não implica em 
transferência dos meus direitos sobre o trabalho para a Universidade. Na qualidade de titular dos direitos de autor(a) do 
trabalho supracitado, de acordo com a Lei nº 9610/98, autorizo a FATEC Ourinhos a disponibilizá-lo gratuitamente, sem 
ressarcimento dos direitos autorais, conforme permissões assinaladas acima, para fins de leitura, impressão e/ou 
download pela internet, a título de divulgação da produção científica gerada pela Faculdade, a partir desta data. 
<p>
<\div>
<div style="text-align: center;"><p>
Ourinhos, ____/_____/______
<p>Assinatura do(a) autor(a) 
__________________________________________ <br><br>
 
<p>Ciência  do(a) orientador(a) 
__________________________________________ 
 
</div>

			
		');

	//Renderizar o html  
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Termo_autoarquivamento", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>