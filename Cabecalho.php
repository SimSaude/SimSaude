<?php
    if (eregi("MSIE", getenv("HTTP_USER_AGENT")) || eregi("Internet Explorer", getenv("HTTP_USER_AGENT")))
    {
        echo "<label class='Erro'>Navegador não compatível. Utilize um navegador moderno.</label>";
        exit;
    }
?>
<header>
    <div id="Cabecalho">
        <?php if (ChecarLogin($ConexaoSQL) == true){ echo '<div id="LogoInterno">'; } else { echo '<div id="LogoExterno">';} ?>
            <a href="<?php if (ChecarLogin($ConexaoSQL) == true){ echo './Inicial.php'; } else { echo './'; }?>" title="Inicial"></a>
        </div>
        <?php if (isset($ExibirNomeSistema) == false){ ?>
            <div id="NomeDoSistema">
                <h1><a href="<?php if (ChecarLogin($ConexaoSQL) == true){ echo './Inicial.php'; } else { echo './'; }?>"><?php echo (isset($NomeDoSistema) ? $NomeDoSistema : "Sim+Saúde" ); ?></a></h1>
            </div>
        <?php } ?>
        <?php if (isset($ExibirMenus) == false){ ?>
            <div id="ContainerDadosDoUsuario">
                <label class="NomeUsuario"><?php if(isset($_SESSION['NomeCompleto'])){ echo "<a href='./' title='Meu Cadastro'>".$_SESSION['NomeCompleto']."</a> Rodrigo |  "; } ?></label>
                <label class="Sair"><a href="./Logout.php" title="Sair do Sistema">Sair</a></label>
            </div>        
            <div id="ContainerMenuSuperior">
                <nav>
                    <ul class="MenuSuperior">
                        <li id="MenuComeco"><a> </a></li>
                        <li id="MenuHome"><a href="./Inicial.php" class="Home" title="Inicial">.</a></li>
                        <li id="Menu"><a href="./Consultas.php" title="Consultas">Consultas</a></li>
                        <li id="Menu"><a href="./Pacientes.php" title="Pacientes">Pacientes</a></li>
                        <li id="Menu"><a href="./Clinica.php" title="Clínica">Clínica</a></li>
                        <li id="Menu"><a href="./Relatorios.php" title="Relatórios">Relatórios</a></li>
                        <li id="MenuComeco"><a>. </a> 
                        </li>
                    </ul>
                </nav>
                <div id="ContainerBusca">
                    <form action="" method="post">		    
                        <input class="Procura" type="text" name="Busca" placeholder="Pesquisa..."/>		    	
                            <button class="Procurar">Procurar</button>
                    </form>
                </div>
            </div>
            <div id="ContainerNavegacao">
                <?php $Rastro->Saida(); ?>
            </div>
            </div>
        <?php } ?>
    </div>
</header>