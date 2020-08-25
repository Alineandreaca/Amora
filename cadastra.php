		<?php
		session_start();
				?>
		<?php
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
				?>
				<?php
	include_once("conexao.php");
	?>
 <html lang="pt-br">
									
	  <head>
	   <meta charset = "utf-8">
		<meta http-equiv = "Conteúdo compatível com X-UA" = "IE = borda">
		 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name = "viewport" content = "width = largura do dispositivo, escala inicial = 1">
		<!-- As três meta tags acima * devem * aparecer primeiro na cabeça; qualquer outro conteúdo principal deve vir * após * essas tags -->
		<meta name = "description" content = "">
		<meta name = "author" content = "Aline Andreaça dos Santos">
		<link rel = "icon" href = "imagens /ms-icon-70x70.png">
		
		 <title>RID - Fatec Ourinhos</title>
		
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
	    <body >
		<!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Home</a></li>
				    </ul>
                </div>
           
        </nav>
       <img alt="Repositório Institucional Fatec Ourinhos" class="img-responsive img" src="assets/img/bg-masthead.jpg"><p>
	  
					<div class="container h-100">
					<div class="row h-100 align-items-center justify-content-center text-center">
						<div class="col-lg-10 align-self-end">
							<h1 class="text-uppercase text-dark font-weight-bold">Faça o seu cadastro no Repositório Institucional Digital</h1>
							<hr class="divider my-4" />
						</div>
						   <div class="col-lg-8 align-self-baseline">
							<p class="text-dark-75 font-weight-light mb-5">Este cadastro permitirá a submissão dos artigos científicos.</p>
							
					<div class="row justify-content-center">
					<div class="container">
				
								<!-- Formulário para cadastro no repositório -->
					
				</div>
					<form method="POST" action="processa.php">
							
					<div class="form-group">
						<label for="inputnome"></label>
						<input type="text" class="form-control" name="nome" placeholder="Nome completo">
					</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputCpf"></label>
								<input type="text" class="form-control" name="cpf" placeholder="Número do CPF sem pontos">
							</div>
							<div class="form-group col-md-4">
								<label for="inputRg"></label>
								<input type="text" class="form-control" name="rg" placeholder="Número do RG sem pontos">
							</div>
							<div class="form-group col-md-4">
								<label for="inputtelefone"></label>
								<input type="text" class="form-control" name="telefone" placeholder=" (DDD) Telefone">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4"></label>
								<input type="email" class="form-control" name="email" placeholder="E-mail">
							</div>
								<div class="form-group col-md-6">
									<label for="inputPassword4"></label>
									<input type="password" class="form-control" name="senha" placeholder="Senha">
								</div>
						</div>
						
						
							
						<button  name ="btnCadastro" class="btn btn-danger btn-lg btn-block btn"  type="submit">Cadastrar</button>
					
					</form>

					</div> <!-- /container -->	
								
								
				</div>
							
						</div>
					</div>
				</div>
			
			
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8 text-center">
							<h2 class="mt-0">Biblioteca Professor Dr. Milton Damato</h2>
							<hr class="divider my-4" />
							<p class="text-muted mb-5">Av. Vitalina Marcuso, 1400, Campus Universitário, Ourinhos-SP  CEP 19919-206.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
							<i class="fas fa-phone fa-3x mb-3 text-muted"></i>
							<div>(14) 3324-3986 - ramal 210</div>
						</div>
						<div class="col-lg-4 mr-auto text-center">
							<i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
							<a class="d-block" href="mailto:contact@yourwebsite.com">f021bibli@cps.sp.gov.br</a>
						</div>
					</div>
				</div>
			</section>
			<!-- Rodapé-->
			<footer class="bg-white py-5">
				<div class="container"><div class="small text-center text-muted">Protótipo 2020 - Aline Andreaça dos Santos</div></div>
			</footer>
			<!-- Bootstrap core JS-->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
			<!-- Third party plugin JS-->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
			<!-- Core theme JS-->
			<script src="js/scripts.js"></script>
		</body>
	</html>
