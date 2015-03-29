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
    <body class="Centro clearfix">
        <?php require("Cabecalho.php");?>
        <section id="ContainerColunas">
            <div class="ColunasP3_1">
                <figure><img src="imagens/desktop.png" width="238" height="125" alt="Teste"></figure>
                <h3>Coluna Desktop</h3>
                <p>
                    Texto.
                </p>
            </div>
            <div class="ColunasP3_2">
                <figure><img src="imagens/tablet.png" width="241" height="125" alt="Teste"></figure>
                <h3>Coluna Tablet</h3>
                <p>
                    Texto.
                </p>
            </div>
            <div class="ColunasP3_3">
                <figure><img src="imagens/mobile.png" width="194" height="125" alt="Teste"></figure>
                <h3>Coluna Mobile</h3>
                <p>
                    Texto.
                </p>
            </div>
        </section>
        <?php require("Rodape.php")?>
    </body>
</html>
