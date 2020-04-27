<?php
	session_start();
?>

  <p class="text-center text-success">
			<?php 
			if(isset($_SESSION['logindeslogado'])){
				echo $_SESSION['logindeslogado'];
				unset($_SESSION['logindeslogado']);
			}
			?>
</body>  
		</p>
		<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
		<meta http-equiv = "Conteúdo compatível com X-UA" = "IE = borda">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name = "viewport" content = "width = largura do dispositivo, escala inicial = 1">
		<meta name = "description" content = "">
		<meta name = "author" content = "Aline Andreaça dos Santos">
		<link rel = "icon" href = "imagens /ms-icon-70x70.png">
          <title>Login- Repositório Institucional Fatec Ourinhos</title>
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
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Home</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#sobre">Sobre</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contato">Contato</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#login">Submeter artigo</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="cadastra.php">Cadastro de alunos</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="admin.php">Administrativo</a></li>
						
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">Bem vindo ao Repositório Institucional Digital da Fatec Ourinhos</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">O Repositório Institucional Digital é o instrumento oficial para coleta, organização e preservação de todo o conhecimento produzido na Fatec Ourinhos.<br><br>
						Para acesso aos artigos científicos e também o download das obras é necessário realizar o login.</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="pesquisaindex.php">Faça sua pesquisa</a>
						<p class="text-center text-white">
						<?php if(isset($_SESSION['loginErro'])){
								echo $_SESSION['loginErro'];
									unset($_SESSION['loginErro']);
						}?>
						<?php
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
				?>
                    </div>
                </div>
            </div>
        </header>
        <!-- About section-->
        <section class="page-section bg-primary" id="login">
		             <style type="text/css">
{
  --input-padding-x: 1.5rem;
  --input-padding-y: .75rem;
}

body 

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 2 rem;
}

.card-signin .card-body {
  padding: 2rem;
}

.form-signin {
  width: 100%;
}

.form-signin .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group input {
  height: auto;
  border-radius: 2rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

.btn-google {
  color: white;
  background-color: #ea4335;
}

.btn-facebook {
  color: white;
  background-color: #3b5998;
}

/* Fallback for Edge
-------------------------------------------------- */

@supports (-ms-ime-align: auto) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}

/* Fallback for IE
-------------------------------------------------- */

@media all and (-ms-high-contrast: none),
(-ms-high-contrast: active) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
}
</style>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
		  <h6 class="card-title text-center">Para submissão de artigos científicos faça login.</h6>
            <h5 class="card-title text-center">Login</h5>
			<form class="form-signin" method="POST" action="valida.php">
              <div class="form-label-group">
			   <label for="inputEmail">e-mail</label><br/>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required>             
              </div>
	
              <div class="form-label-group">
			       <label for="inputPassword">Senha</label><br/>
                <input type="password" name= "senha" id="inputPassword" class="form-control" placeholder="Password" required>
               </div>
			
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Lembrar senha</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Acessar</button>
              
            </form> 
			<div class="card-title text-center"> 
			<h6>Você ainda não possui uma conta?</h6><h6 class="form-signin-heading">Faça o seu cadastro 
			<a href="cadastra.php" class="cadastro">aqui</a></h6>
			</div>			
        </div>
      </div>
    </div>
  </div>
  	</section>
	<!-- section-->
      <section class="page-section" id="sobre">
            <div class="container text-justify">
                <h5 class="mb-4">Este protótipo é um repositório institucional digital para armazenamento, 
				disseminação e recuperação de trabalhos de graduação da FATEC Ourinhos. Essa aplicação tem 
				por objetivo facilitar a comunicação científica entre a comunidade acadêmica através deste repositório 
				institucional digital, contribuindo assim para o ciclo de criação, disseminação e uso da informação científica. 
				Para construção de todo o projeto do sistema, foi utilizada ferramentas que geram diagramas e 
				auxiliam na documentação do software, linguagem PHP para construção do sistema, banco de dados 
				MySql e Modelo Hibrído como padrão de elaboração de todo o projeto de documentação da aplicação.</h5>
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
                        ><!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
						<a class="d-block" href="mailto:contact@yourwebsite.com">f021bibli@cps.sp.gov.br</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
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
