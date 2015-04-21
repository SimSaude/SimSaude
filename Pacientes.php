<!DOCTYPE html>
<?php
    require("includes/Protecao.php");
    require("includes/Funcoes.php");
    $Rastro = new RastroDeNavegacao();
    $Rastro->Adicionar("Pacientes", EscapeURL(filter_var($_SERVER['PHP_SELF'], FILTER_SANITIZE_URL)), 2);
?>
<html>
    <head>
        <?php require("includes/SecaoHead.php"); ?>
    </head>
    <body>
        <?php require("Cabecalho.php");?>
        <?php if ($_GET['u'] == 'a') { ?>
            <!--Inicial Administrador-->
            <!--Não permitido. Voltar à home.-->
        <?php } else if ($_GET['u'] == 'n') { ?>
            <!--Pacientes Nutricionista-->
            <div class="Colunas Coluna1_3">
                <figure><img src="imagens/titulosemlogo.png" width="200px" height="10px" alt="Novo Conteúdo"></figure>
                <h3>Pacientes</h3>
                <p>
                    Lista de Todos os Pacientes.<br/>
                    Campo de busca de paciente.
                </p>    
            </div>
            <div class="Colunas Coluna2_3">
                <figure><img src="imagens/titulosemlogo.png" width="200px" height="10px" alt="Novo Conteúdo"></figure>
                <h3>Dados do Paciente</h3>
                <p>
                    Dados do Paciente Selcionado.<br/>
                    Nome.<br/>
                    Sexo.<br/>
                    Data de Nascimento.<br/>
                    Idade.<br/>
                    Número de Consultas Concluídas.<br/>
                    Altura.<br/>
                    Observações
                </p>
            </div>
            <div class="Colunas Coluna3_3">
                <figure><img src="imagens/titulosemlogo.png" width="200px" height="10px" alt="Novo Conteúdo"></figure>
                <h3>Histórido de Medidas Corporais</h3>
                <p>
                    Data da Tabela.<br/>
                    Altura.<br/>
                    Peso.<br/>
                    Coxa.<br/>
                    Quadril.<br/>
                    Abdômen.<br/>
                    Braço.<br/>
                </p>
            </div>
        <?php } else if ($_GET['u'] == 'r') { ?>
            <!--Pacientes Recepcionista-->
            <!--Para o recepcionista, exibir usuários cadastrados, permitir cadastro e alteração de usuários cadastrados.-->
            <div class="Colunas Coluna1_2">
                <figure><img src="imagens/titulosemlogo.png" width="200px" height="10px" alt="Novo Conteúdo"></figure>
                <h3>Pacientes</h3>
                <p>
                    Lista de Todos os Pacientes.<br/>
                    Campo de busca de paciente.<br/>
                    Botão de cadastro de pacientes.
                </p>    
            </div>
            <div class="Colunas Coluna2_2">
                <figure><img src="imagens/titulosemlogo.png" width="200px" height="10px" alt="Novo Conteúdo"></figure>
                <h3>Dados do Paciente</h3>
                <p>
                    Dados do Paciente Selcionado.<br/>
                    Nome.<br/>
                    Sexo.<br/>
                    Data de Nascimento.<br/>
                    Idade.<br/>
                    Número de Consultas Concluídas.<br/>
                    Altura.<br/>
                    Observações
                </p>
            </div>
        <?php } else { ?>
            <!--Pacientes Paciente-->
            <!--Não permitido. Voltar à home.-->
        <?php } ?>
        <?php require("Rodape.php")?>
    </body>
</html>