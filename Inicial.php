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
        <script type="text/JavaScript" src="js/Widgets.js"></script>
        <style>
            .no-close .ui-dialog-titlebar-close { display: none; }
        </style>
    </head>
    <body>
        <?php require("Cabecalho.php"); ?>
        <section id="ContainerColunas">
            <div class="Colunas Coluna1_2">
                <h3>Consultas do Mês</h3>
                Janela ocupa a coluna inteira com o calendário estendido.
            </div>
            <div class="Colunas Coluna2_2">
                <h3>Próximas Consultas</h3>
                Várias janelas com os horários das próximas consultas.
            </div>
            <div id="dialog" title="Teste diálogo modal">Diálogo modal.<br/>AutoClose em 2.5 segundos.</div>
        </section>
        <?php require("Rodape.php")?>
    </body>
</html>
