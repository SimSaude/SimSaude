<!DOCTYPE html>
<?php
    include_once('includes/ConexaoBD.php');
    include_once('includes/FuncoesDeSeguranca.php');

    IniciarSessaoSegura();
?>
<html lang="pt-br"> 
    <head>
        <?php require("includes/SecaoHead.php"); ?>
    </head>
    <body>
        <?php $ExibirMenus = false; require("Cabecalho.php"); ?>   
        <section id="ContainerColunas">
            <h1>Sobre Sim+Saúde</h1>
        </section>
        <?php require("Rodape.php")?>
    </body>
</html>