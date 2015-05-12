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
            <!--Consultas Administrador-->
            <!--Não permitido a adinistradores-->
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
            <!--O dia selecionado é recebido via post da home do recepcionista-->
            Dia recebido via POST. (Cadastro de consultas RECEPCIONISTA)
            <div class="Colunas Coluna1_2">
                <figure><img src="imagens/titulosemlogo.png" width="200px" height="10px" alt="Novo Conteúdo"></figure>
                <h3>Dados da Consulta</h3>
                <p>
                    Hora da Conulta<br/>
                    Nutricionista CBOX (Exibe os horários deste nutricionista na próxima coluna)<br/>
                    Paciente<br/>
                    Prontuário<br/>
                </p>
            </div>
            <div class="Colunas Coluna2_2">
                <figure><img src="imagens/titulosemlogo.png" width="200px" height="10px" alt="Novo Conteúdo"></figure>
                <h3>Agenda do Nutricionista</h3>
                <p>
                    Tabela com dados das consultas do dia para o nutricionista selecionado.
                    Paciente | Hora
                </p>
            </div>
        <?php } else { ?>
            <!--Consultas Paciente-->
        <?php } ?>
        <?php require("Rodape.php")?>
    </body>
</html>
