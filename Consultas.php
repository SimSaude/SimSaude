<!DOCTYPE html>
<?php
    require("includes/Protecao.php");
    require("includes/Funcoes.php");
    $Rastro = new RastroDeNavegacao();
    $Rastro->Adicionar("Consultas", EscapeURL(filter_var($_SERVER['PHP_SELF'], FILTER_SANITIZE_URL)), 1);
    /*
     * Verificar tipo de usuário com PHP aqui.
     */
?>
<html>
    <head>
        <?php require("includes/SecaoHead.php"); ?>
        <script>
            $(function() {
                $( "#datepicker" ).datepicker();
            });
        </script>
    </head>
    <body>
        <?php require("Cabecalho.php");?>
        <?php if ($_GET['u'] == 'a') { ?>
            <!--Inicial Administrador-->
        <?php } else if ($_GET['u'] == 'n') { ?>
            <!--Consultas Nutricionista-->
            <div class="Colunas Coluna1_1">
                <figure><img src="imagens/titulosemlogo.png" width="200px" height="10px" alt="Novo Conteúdo"></figure>
                <h3>Consultas</h3>
                <p>
                    Calendário de uma linha.<br/>
                    Campo de pesquisa.<br/>
                    Tabela com as consultas.<br/>
                    Botão "realizar consulta".(?)<br/>
                </p>
            </div>
        <?php } else if ($_GET['u'] == 'r') { ?>
            <!--Consultas Recepcionista-->
        <?php } else { ?>
            <!--Consultas Paciente-->
        <?php } ?>
        <?php require("Rodape.php")?>
    </body>
</html>
