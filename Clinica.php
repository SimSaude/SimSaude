<!DOCTYPE html>
<?php
    require("includes/Protecao.php");
    require("includes/Funcoes.php");
    $Rastro = new RastroDeNavegacao();
    $Rastro->Adicionar("Clínica", EscapeURL(filter_var($_SERVER['PHP_SELF'], FILTER_SANITIZE_URL)), 3);
?>
<html>
    <head>
        <?php require("includes/SecaoHead.php"); ?>
    </head>
    <body>
        <?php require("Cabecalho.php");?>
        <section id="ContainerColunas">
            <div class="Colunas Coluna1_1">
                <figure><img src="imagens/titulosemlogo.png" width="200px" height="10px" alt="Novo Conteúdo"></figure>
                <h3>Clínica</h3>
                <p>
                    Informações sobre a clínica.
                </p>    
            </div>
        </section>
        <?php require("Rodape.php")?>
    </body>
</html>
