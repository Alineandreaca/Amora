<aside class="ls-sidebar">
    <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
        
              <a href="#" class="ls-ico-user" style="text-transform:uppercase;">
                <small><?php echo $userLogin['nome']; ?></small>
              </a>
              <nav class="ls-dropdown-nav ls-user-menu">
                <ul>
                  <li><a href="perfil.php">Perfil</a></li>
                  <li><a href="logout.php">Sair</a></li>
                </ul>
              </nav>
            </div>


  <div class="ls-sidebar-inner">
      
      <nav class="ls-menu">
        <ul>
           <li><a href="painel.php" class="ls-ico-dashboard" title="Dashboard">Painel de controle</a></li>
           <li><a href="listaUsuario.php" class="ls-ico-ftp" title="Projeto de Pesquisa">Usuários</a></li>
           <li><a href="listaPublicacao.php" class="ls-ico-docs" title="Publicação">Publicação</a></li>
           <li><a href="sub.php" class="ls-ico-cloud-upload" title="Submissões">Submissões</a></li>                   
			<li>
            <!--a href="#" class="ls-ico-lamp" title="Configurações">Relatórios em tabelas</a>
            <ul>
              <li><a href="artigos_listados.php">Artigos</a></li>
                 </ul>
				 <ul>
              <li><a href="usuarios_listados.php">Usuários</a></li>
                 </ul>
          </li> 
			<li-->
            <a href="#" class="ls-ico-lamp" title="Configurações">Relatórios em PDF</a>
            <ul>
              <li><a href="gerar_relatorios_artigo.php">Artigos</a></li>
                 </ul>
				 <ul>
              <li><a href="gerar_relatorios_pdf.php">Usuários</a></li>
                 </ul>
          </li>          
		  <li>
            <a href="#" class="ls-ico-cog" title="Configurações">Configurações</a>
            <ul>
              <li><a href="perfil.php">Perfil</a></li>
                 </ul>
          </li>

        </ul>
      </nav>


  </div>
</aside>