<?php
    if (eregi("MSIE", getenv("HTTP_USER_AGENT")) || eregi("Internet Explorer", getenv("HTTP_USER_AGENT")))
    {
        echo "<label class='Erro'>Navegador não compatível. Utilize um navegador moderno.</label>";
        exit;
    }
?>
<header>
    <div id="Cabecalho">
        <div id="Logo">
            <a href="<?php if (ChecarLogin($ConexaoSQL) == true){ echo './Inicial.php'; } else { echo './'; }?>" title="Inicial"></a>
        </div>
        <?php if (isset($ExibirMenus) == false){ ?>
            <div id="ContainerNavegacao">
                <label>Você está em:</label>
                <?php $Rastro->Saida(); ?>
            </div>
            <div id="ContainerDadosDoUsuario">
                <label class="NomeUsuario"><?php echo "<a href='./' title='Meu Cadastro'>"; if(isset($_SESSION['NomeCompleto'])){ echo $_SESSION['NomeCompleto']; } else { echo "Usuário não logado"; } echo "</a> | "; ?></label>
                <label class="Sair"><a href="./Logout.php" title="Sair do Sistema">Sair</a></label>
            </div>
            <div id="ContainerMenuSuperior">
                <nav>
                    <ul class="MenuSuperior">
                        <li id="MenuHome"><a href="./Inicial.php" class="Home" title="Inicial">.</a></li>
                        <li id="Menu"><a href="./Consultas.php" title="Consultas">Consultas</a></li>
                        <li id="Menu"><a href="./Pacientes.php" title="Pacientes">Pacientes</a></li>
                        <li id="Menu"><a href="./Clinica.php" title="Clínica">Clínica</a></li>
                        <li id="Menu"><a href="./Relatorios.php" title="Relatórios">Relatórios</a></li>
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
        <?php } ?>
    </div>
</header>