<!DOCTYPE html>
<?php
    require("includes/Protecao.php");
    require("includes/Funcoes.php");
    $Rastro = new RastroDeNavegacao();
    $Rastro->Adicionar("Relatórios", EscapeURL(filter_var($_SERVER['PHP_SELF'], FILTER_SANITIZE_URL)), 4);
?>
<html>
    <head>
        <?php require("includes/SecaoHead.php"); ?>
    </head>
    <body>
        <?php require("Cabecalho.php");?>
        <section id="ContainerColunas">
            <div class="Colunas Coluna1_3">
                <figure><img src="imagens/titulosemlogo.png" width="200px" height="10px" alt="Novo Conteúdo"></figure>
                <h3>Relatórios</h3>
                <p>
                    Coluna 1.
                </p>    
            </div>
            <div class="Colunas Coluna2_3">
                <figure><img src="imagens/titulosemlogo.png" width="200px" height="10px" alt="Novo Conteúdo"></figure>
                <h3>Relatórios</h3>
                <p>
                    Coluna 2.
                </p>
            </div>
            <div class="Colunas Coluna3_3">
                <figure><img src="imagens/titulosemlogo.png" width="200px" height="10px" alt="Novo Conteúdo"></figure>
                <h3>Relatórios</h3>
                <p>
                    Coluna 3.
                </p>
            </div>
        </section>
        <?php require("Rodape.php")?>
    </body>
</html>
