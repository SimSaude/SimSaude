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
            <?php if ($_GET['u'] == 'a') { ?>
                <!--Clínica Administrador-->
                <div class="Colunas Coluna1_1">
                    <h3>Informações da Clínica</h3>
                    Campos editáveis.
                </div>
            <?php } else { ?>
                <!--Clínica Nutricionista-->
                <!--Clínica Recepcionista-->
                <!--Clínica Paciente-->
                <div class="Colunas Coluna1_1">
                    <h3>Informações da Clínica</h3>
                    Visualizar informações da clínica.
                </div>
            <?php } ?>
        </section>
        <?php require("Rodape.php")?>
    </body>
</html>
