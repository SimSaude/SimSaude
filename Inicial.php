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
            .Coluna                             { margin-left: 15px; width: calc(100% / 3 - 15px); min-width: 200px; max-width: 310px; float: left; padding-bottom: 100px; }
            .Portlet                            { margin: 0 1em 1em 0; padding: 0.3em; }
            .Portlet-titulo                     { padding: 0.2em 0.3em; margin-bottom: 0.5em; position: relative; cursor: move; }
            .Portlet-permutar                   { position: absolute; top: 50%; right: 0; margin-top: -8px; }
            .Portlet-conteudo                   { padding: 0 0.4em 0.4em 0.4em; }
            .Portlet-placeholder                { border: 1px dotted green; margin: 0 1em 1em 0; height: 75px; }
        </style>
    </head>
    <body>
        <?php require("Cabecalho.php"); ?>
        <section id="ContainerColunas">
            <div class="Colunas Coluna1_2">
                <h3>Consultas</h3>
                <div class="Coluna">
                    <div class="Portlet">
                        <div class="Portlet-titulo">Consultas do Mês</div>
                        <div class="Portlet-conteudo"><div id="datepicker"></div></div>
                    </div>
                    <div class="Portlet">
                        <div class="Portlet-titulo">Teste</div>
                        <div class="Portlet-conteudo">Arraste-me.</div>
                    </div>
                    <div class="Portlet">
                        <div class="Portlet-titulo">Teste</div>
                        <div class="Portlet-conteudo">Arraste-me.</div>
                    </div>
                </div>
                <div class="Coluna">
                    <div class="Portlet">
                        <div class="Portlet-titulo">Teste</div>
                        <div class="Portlet-conteudo">Arraste-me.</div>
                    </div>
                    <div class="Portlet">
                        <div class="Portlet-titulo">Teste</div>
                        <div class="Portlet-conteudo">Arraste-me.</div>
                    </div>
                </div>
                <div class="Coluna">
                    <div class="Portlet">
                        <div class="Portlet-titulo">Teste</div>
                        <div class="Portlet-conteudo">Arraste-me.</div>
                    </div>
                    <div class="Portlet">
                        <div class="Portlet-titulo">Teste</div>
                        <div class="Portlet-conteudo">Arraste-me.</div>
                    </div>
                </div>
            </div>
            <div class="Colunas Coluna2_2">
                <h3>Pacientes</h3>
                <div class="Coluna">
                    <div class="Portlet">
                        <div class="Portlet-titulo">Nome</div>
                        <div class="Portlet-conteudo">Data + Horário + Dados</div>
                    </div>
                </div>
                <div class="Coluna">
                    <div class="Portlet">
                        <div class="Portlet-titulo">Nome</div>
                        <div class="Portlet-conteudo">Data + Horário + Dados</div>
                    </div>
                    <div class="Portlet">
                        <div class="Portlet-titulo">Nome</div>
                        <div class="Portlet-conteudo">Data + Horário + Dados</div>
                    </div>
                </div>
                <div class="Coluna">
                    <div class="Portlet">
                        <div class="Portlet-titulo">Nome</div>
                        <div class="Portlet-conteudo">Data + Horário + Dados</div>
                    </div>
                    <div class="Portlet">
                        <div class="Portlet-titulo">Nome</div>
                        <div class="Portlet-conteudo">Data + Horário + Dados</div>
                    </div>
                </div>
            </div>
            <div id="dialog" title="Teste diálogo modal">Mensagem de teste.</div>
        </section>
        <?php require("Rodape.php")?>
    </body>
</html>
