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
        <?php if (isset($ExibirNomeSistema) == false){ ?>
            <div id="NomeDoSistema">
                <h1><a href="<?php if (ChecarLogin($ConexaoSQL) == true){ echo './Inicial.php'; } else { echo './'; }?>"><?php echo (isset($NomeDoSistema) ? $NomeDoSistema : "Nome do Sistema" ); ?></a></h1>
            </div>
        <?php } ?>
        <?php if (isset($ExibirMenus) == false){ ?>
        <div id="ContainerDadosDoUsuario">
            <label class="NomeUsuario"><?php if(isset($_SESSION['NomeCompleto'])){ echo "<a href='./' title='Meu Cadastro'>".$_SESSION['NomeCompleto']."</a> | "; } ?></label>
            <label class="Sair"><a href="./Logout.php" title="Sair do Sistema">Sair</a></label>
        </div>        
        <div id="ContainerMenuSuperior">
            <nav>
                <ul class="MenuSuperior">
                    <li id="Teste"><a href="./Inicial.php" class="Home" title="Inicial">.</a></li>
                    <li id="Teste"><a href="./Tarefas.php" title="Controle de Tarefas">Tarefas</a></li>
                    <li id="Teste"><a href="./Teste(1).php" title="Teste">Teste</a></li>
                    <li id="Teste"><a href="./Teste(2).php" title="Teste">Teste</a></li>
                    <li id="Teste"><a href="./Teste(3).php" title="Teste">Teste</a></li>
                    <li id="Teste"><a href="./Teste(4).php" title="Teste">Teste</a></li>
                    <li id="Teste"><a href="./Teste(5).php" title="Teste">Teste</a></li>
                    <li id="Teste"><a href="#" title="Teste">Teste</a></li>
                </ul>
            </nav>
        </div>
        <div id="ContainerNavegacao">
            <?php $Rastro->Saida(); ?>
        </div>
        <div id="ContainerBusca">
            <form action="" method="post">		    
                <input class="Procura" type="text" name="Busca" placeholder="Pesquisa..."/>		    	
                <button class="Procurar">Procurar</button>
            </form>
        </div>
        <?php } ?>
    </div>
</header>