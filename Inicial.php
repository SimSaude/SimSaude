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
            <?php if ($_GET['u'] == 'a') { ?>
                <!--Inicial Administrador-->
                <div class="Colunas Coluna1_2">
                    <h3>Gráfico</h3>
                    Pacientes atendidos na clínica.
                </div>
                <div class="Colunas Coluna2_2">
                    <h3>Gráfico</h3>
                    Pacientes atendidos por medico.
                </div>
            <?php } else if ($_GET['u'] == 'n') { ?>
                <!--Inicial Nutricionista-->
                <div class="Colunas Coluna1_2">
                    <h3>Calendário</h3>
                    Calendário estendido.
                </div>
                <div class="Colunas Coluna2_2">
                    <h3>Tabela de Próximas Consultas</h3>
                    Data da Consulta | Hora da Consulta | Nome Paciente | Link Cancelar Consulta
                </div>
            <?php } else if ($_GET['u'] == 'r') { ?>
                <!--Inicial Recepcionista-->
                <div class="Colunas Coluna1_2">
                    <h3>Calendário</h3>
                    Calendário estendido e interativo (ao clicar no dia, alterar a próxima coluna).
                </div>
                <div class="Colunas Coluna2_2">
                    <h3>Tabela de Consultas para o Dia Selecionado</h3>
                    Hora da Consulta | Nome Paciente | Nome Nutricionista | Link Cancelar Consulta<br/>
                    Botão Agendar Consulta.
                </div>
            <?php } else { ?>
                <!--Inicial Paciente-->
                <div class="Colunas Coluna1_3">
                    <h3>Propaganda</h3>
                    Propaganda estendida verticalmente.
                </div>
                <div class="Colunas Coluna2_3">
                    <h3>Histórico de Consultas</h3>
                    Tabela com o histórico de consultas. <br/>
                    Data | Hora | Local | Nutricionista | Status
                </div>
                <div class="Colunas Coluna3_3">
                    <h3>Resumo da dieta mais recente</h3>
                </div>
            <?php } ?>
            <div id="dialog" title="Teste diálogo modal">Diálogo modal.<br/>AutoClose em 2.5 segundos.</div>
        </section>
        <?php require("Rodape.php")?>
    </body>
</html>
