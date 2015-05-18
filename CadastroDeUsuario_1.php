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
                    Cadastro de Usuários - Contato
                <p class="Requerido Direita">* Campos Requeridos</p><br/>
                <form action="<?php echo EscapeURL($_SERVER['PHP_SELF']); ?>" method="post" name="FormularioDeCadastro">

                   <div class="ContainerDeCampos">
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_celular1" id="lbl_celular1"> Celular 1</label></div>
                                <div class="ColunaInput"><input id="txt_celular1" name="txt_celular1" type="tel" aria-labelledby="lbl_residencial1" maxlength="10"/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_celular2" id="lbl_celular2"> Celular 2</label></div>
                                <div class="ColunaInput"><input id="txt_celular2" name="txt_celular2" type="tel" aria-labelledby="lbl_residencial2" maxlength="10"/></div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_residencial1" id="lbl_residencial1"> Residencial 1</label></div>
                                <div class="ColunaInput"><input id="txt_residencial1" name="txt_residencial1" type="tel" aria-labelledby="lbl_residencial1" maxlength="10"/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_residencial2" id="lbl_residencial2"> Residencial 2</label></div>
                                <div class="ColunaInput"><input id="txt_residencial2" name="txt_residencial2" type="tel" aria-labelledby="lbl_residencial2" maxlength="10"/></div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_comercial1" id="lbl_comercial1"> Comercial 1</label></div>
                                <div class="ColunaInput"><input id="txt_comercial1" name="txt_comercial1" type="tel" aria-labelledby="lbl_comercial1" maxlength="10"/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_ramal1" id="lbl_ramal1"> Ramal 1</label></div>
                                <div class="ColunaInput"><input id="txt_ramal1" name="txt_ramal1" type="number" aria-labelledby="lbl_ramal1" maxlength="6"/></div>
                            </div>
                        </div>
                       
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_comercial2" id="lbl_comercial2"> Comercial 2</label></div>
                                <div class="ColunaInput"><input id="txt_comercial2" name="txt_comercial2" type="tel" aria-labelledby="lbl_comercial2" maxlength="10"/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_ramal2" id="lbl_ramal2"> Ramal 2</label></div>
                                <div class="ColunaInput"><input id="txt_ramal2" name="txt_ramal2" type="tel" aria-labelledby="lbl_ramal2" maxlength="6"/></div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_nextel" id="lbl_nextel"> Nextel</label></div>
                                <div class="ColunaInput"><input id="txt_nextel" name="txt_nextel" type="tel" aria-labelledby="lbl_nextel" maxlength="11"/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_radioid" id="lbl_radioid">     Rádio ID</label></div>
                                <div class="ColunaInput"><input id="txt_radioid" name="txt_radioid" type="text" aria-labelledby="lbl_radioid" maxlength="14"/></div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_fax" id="lbl_fax">Fax</label></div>
                                <div class="ColunaInput"><input id="txt_fax" name="txt_fax" type="tel" aria-labelledby="lbl_fax" maxlength="10"/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_outro" id="lbl_outro">Outro</label></div>
                                <div class="ColunaInput"><input id="txt_outro" name="txt_outro" type="text" aria-labelledby="lbl_outro" maxlength="11"/></div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="ContainerDeBotoes">
                        <div class="Botao">
                            
                            <input type="button" value="Voltar" onclick="document.location.href='CadastroDeUsuario.php'"/>
                            <input type="button" value="Confirmar" onclick="return HashFormularioRegistro(this.form, this.form.NomeUsuario, this.form.Email, this.form.Senha, this.form.ConfirmarSenha);"/>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <?php require("Rodape.php")?>
    </body>
</html>



