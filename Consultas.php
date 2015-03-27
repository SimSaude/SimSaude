<!DOCTYPE html>
<?php
    require("includes/Protecao.php");
    require("includes/Funcoes.php");
    $Rastro = new RastroDeNavegacao();
    $Rastro->Adicionar("Consultas", EscapeURL(filter_var($_SERVER['PHP_SELF'], FILTER_SANITIZE_URL)), 0);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=divice-width, initial-scale=1.0">
        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="css/paginas.css" type="text/css">
        <link rel="stylesheet" href="css/cabecalho.css" type="text/css">
        <link rel="stylesheet" href="css/rodape.css" type="text/css">
        <title>Singev</title>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/funcoes.js"></script>
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
