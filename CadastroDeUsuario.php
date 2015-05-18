<!DOCTYPE html>
<?php
    require("includes/Protecao.php");
    require("includes/Funcoes.php");
    $Rastro = new RastroDeNavegacao();
    $Rastro->Adicionar("Cadastro", EscapeURL(filter_var($_SERVER['PHP_SELF'], FILTER_SANITIZE_URL)), 1);
?>
<html>
    <head>
        <?php require("includes/SecaoHead.php"); ?>
        <script type="text/JavaScript" src="js/ValidarCPFeCNPJ.js"></script>
        <script type="text/JavaScript" src="js/FuncoesCPFCNPJ.js"></script>
        <link rel="stylesheet" href="css/Cadastro.css" type="text/css">
        <style>
            .CPFouCNPJValido
            {
                    border: 1px solid green;
            }
            .CPFouCNPJInvalido
            {
                    border: 1px solid red;
            }
        </style>
    </head>
    <body>
        <?php require("Cabecalho.php");?>
        <section id="ContainerColunas">
            <?php if (empty($MensagemDeErro) == false) { echo $MensagemDeErro; } ?>
            <div id="Formulario">
                <h>Cadastro de Usuários - Dados Pessoais</h>
                <p class="Requerido Direita">* Campos Requeridos</p><br/>
                <form action="<?php echo EscapeURL($_SERVER['PHP_SELF']); ?>" method="post" name="FormularioDeCadastro">

                    <div class="ContainerDeCampos">
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_nomecompleto" id="lbl_nomecompleto"><span class="Requerido">*</span> Nome Completo</label></div>
                                <div class="ColunaInput"><input id="txt_nomecompleto" name  ="txt_nomecompleto"type="text" aria-labelledby="lbl_nomecompleto" maxlength="120" title="Nome Completo. Campo requerido." required></div>
                            </div>
                            <div class="MeiaColuna">    
                                <div class="ColunaLabel"><label for="txt_cpf" id="lbl_cpf"><span class="Requerido">*</span> CPF</label></div>
                                <div class="ColunaInput"><input id="txt_cpf" class="CPFouCNPJ" name="txt_cpf" type="text" aria-labelledby="lbl_cpf" maxlength="11" required></div>                          
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_rg" id="lbl_rg"> RG</label></div>
                                <div class="ColunaInput"><input id="txt_rg" name="txt_rg" type="text" aria-labelledby="lbl_rg" maxlength="9"/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_email" id="lbl_email"> Email</label></div>
                                <div class="ColunaInput"><input id="txt_email" name="txt_email" type="email" aria-labelledby="lbl_email" maxlength="60"/></div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_datadenascimento" id="lbl_datadenascimento"> Data de Nascimento</label></div>
                                <div class="ColunaInput"><input id="txt_datadenascimento" name="txt_datadenascimento" type="date" aria-labelledby="lbl_datadenascimento"/></div>
                            </div>
                        </div>
                    </div>
                    <h>Endereço</>    
                     <div class="ContainerDeCampos">
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_cep" id="lbl_cep">CEP</label></div>
                                <div class="ColunaInput"><input id="txt_cep" name="txt_cep" type="text" aria-labelledby="lbl_cep" maxlength="11"/></div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_rua" id="lbl_rua">Rua</label></div>
                                <div class="ColunaInput"><input id="txt_rua" name="txt_rua" type="text" aria-labelledby="lbl_rua" maxlength="120"/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_numero" id="lbl_numero">Número</label></div>
                                <div class="ColunaInput"><input id="txt_numero" name="txt_numero" type="number" aria-labelledby="lbl_numero" min="0"/></div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_bairro" id="lbl_bairro">Bairro</label></div>
                                <div class="ColunaInput"><input id="txt_bairro" name="txt_bairro" type="text" aria-labelledby="lbl_bairro" maxlength="80"/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_municipio" id="lbl_municipio">Município</label></div>
                                <div class="ColunaInput"><input id="txt_municipio" name="txt_municipio" type="text" aria-labelledby="lbl_municipio" maxlength="20"/></div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_uf" id="lbl_uf">UF</label></div>
                                <div class="ColunaInput"><input id="txt_uf" name="txt_uf" type="text" aria-labelledby="lbl_uf" maxlength="2"/></div>
                            </div>
                        </div>
                    </div>
                    
                    <div ID="StatusInferior">
                        
                    </div>
                    <div class="ContainerDeBotoes">
                        <div class="Botao">
                            <input type="button" value="Próxima Tela" onclick="document.location.href='CadastroDeUsuario_1.php'"/>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <?php require("Rodape.php")?>
    </body>
</html>



