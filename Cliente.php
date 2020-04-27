
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
		
		 <title>Aluno</title>
		
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
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="sair.php">Sair</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href=""><?php
							session_start();
							echo "Olá ". $_SESSION['usuarioNome'].", bem vindo! <br>";	
?></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="submissao.php">Submeter artigo</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="gerar_pdf.php">Termo de autoarquivamento para impressão</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contato">Contato</a></li>
                    </ul>
                </div>
            </div>
        </nav>
		                       
        <!-- Section-->
				 
			 <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">Diretrizes para o Autoarquivamento do artigo científico no Repositório Institucional Digital da Fatec Ourinhos</h2>
				<br>
					<h4>O que é o autoarquivamento?</h4></p>
					<h6>O autoarquivamento é o processo em que o autor realiza a submissão de seu trabalho em um repositório.</h6></p>
					<h4>Prazos</h4></p>
					<h6>Para o autoarquivamento é necessário que você conclua as alterações em seu artigo científico, ou seja, que a versão final de seu trabalho esteja pronta, já incluindo as correções decorrentes da defesa.
					O autoarquivamento do trabalho, com as alterações indicadas pela banca na defesa, deve ser realizado em até 15 dias após a defesa.</h6></p>
					<h4>Entrega da versão impressa</h4></p>
					<h6>Ao concluir a submissão, os dados informados serão inseridos no repositório, imprima o Termo de autoarquivamento e entregue-o na Seção Técnica da Graduação junto ao exemplar impresso do seu artigo científico.
					</h6><br>
					 <a class="btn btn-danger btn-xl" href=""><h4>Atenção!</h4></a></p>
					
					<h6>O texto do exemplar impresso deve ser idêntico ao texto do arquivo PDF submetido ao Repositório, ou seja, deve ser a versão final do trabalho, incluindo as modificações realizadas após a defesa.
					</h6><br>
                
				
            </div>
        </section>
        <!-- Contact section-->
			<section class="page-section" id="contato">
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
							<i class="fas fa-envelope fa-3x mb-3 text-muted"></i
							><!-- Make sure to change the email address in BOTH the anchor text and the link target below!--><a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
						</div>
					</div>
				</div>
			</section>
			<!-- Footer-->
			<footer class="bg-light py-5">
				<div class="container"><div class="small text-center text-muted">Copyright © 2020 - Start Bootstrap</div></div>
			</footer>
			<!-- Bootstrap core JS-->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
			<!-- Third party plugin JS-->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
			<!-- Core theme JS-->
			<script src="js/scripts.js"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
  
		</body>
	</html>
