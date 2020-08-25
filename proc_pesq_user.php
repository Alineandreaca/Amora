<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "repo_login";

$conn = mysqli_connect($servername, $username, $password, $dbname);
	
//Receber a requisição da pesquisa
$requestData= $_REQUEST;

      
//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	0 =>'nome', 
	1 =>'cpf',
	2 => 'rg',
	3 => 'email',
	4 =>'senha', 
	5 =>'niveis_acesso_id',
	6 =>'telefone',
	);	
	
//Obtendo registros de número total sem qualquer pesquisa
$result_user="SELECT nome, cpf, rg, email, senha, niveis_acesso_id, telefone FROM usuarios_alunos";
$resultado_user = mysqli_query($conn,$result_user);
$qnt_linhas=mysqli_num_rows($resultado_user);
		
//Obter os dados a serem apresentados
$result_usuarios = "SELECT nome, cpf, rg, email, senha, niveis_acesso_id, telefone FROM usuarios WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND ( nome LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR cpf LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR rg LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR email LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR senha LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR niveis_acesso_id LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR telefone LIKE '".$requestData['search']['value']."%' )";
	
}		
		$resultado_usuarios=mysqli_query($conn, $result_usuarios);
		$totalFiltered = mysqli_num_rows($resultado_usuarios);
				
//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=mysqli_query($conn, $result_usuarios);
		
		// Ler e criar o array de dados
$dados = array();
while( $row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
	$dado = array();
	$dado[] = $row_usuarios["nome"];
	$dado[] = $row_usuarios ["cpf"];
	$dado[] = $row_usuarios ["rg"];
	$dado[] = $row_usuarios["email"];	
	$dado[] = $row_usuarios["senha"];
	$dado[] = $row_usuarios ["niveis_acesso_id"];
	$dado[] = $row_usuarios ["telefone"];
	$dados[] = $dado;
		}
		
		//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json
?>