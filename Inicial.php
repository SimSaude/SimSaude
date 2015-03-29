<!DOCTYPE html>
<?php
    require("includes/Protecao.php");
    require("includes/Funcoes.php");
    $Rastro = new RastroDeNavegacao();
    $Rastro->Adicionar("Inicial", EscapeURL(filter_var($_SERVER['PHP_SELF'], FILTER_SANITIZE_URL)), 0);
?>
<html>
    <head>  
        <?php require("includes/SecaoHead.php"); ?>
    </head>
    <body class="Centro">
        <?php require("Cabecalho.php"); ?>
        <section id="ContainerColunas">
            <div class="ColunasP3_1">
                <figure><img src="" width="" height="" alt=""></figure>
                <h3></h3>
                <p>
                </p>    
            </div>
            <div class="ColunasP3_2">
                <figure><img src="" width="" height="" alt=""></figure>
                <h3></h3>
                <p>
                </p>
            </div>
            <div class="ColunasP3_3">
                <figure><img src="" width="" height="" alt=""></figure>
                <h3></h3>
                <p>
                </p>
            </div>
        </section>
        <?php require("Rodape.php")?>
    </body>
</html>
