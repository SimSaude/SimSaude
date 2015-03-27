<!DOCTYPE html>
<?php
    /*include_once ('includes/Registrar.inc.php');
    include_once ('includes/FuncoesDeSeguranca.php');*/
	require("includes/Protecao.php");
    require("includes/Funcoes.php");
    $Rastro = new RastroDeNavegacao();
    $Rastro->Adicionar("Cadastro", EscapeURL(filter_var($_SERVER['PHP_SELF'], FILTER_SANITIZE_URL)), 1);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
        <meta name="viewport" content="width=divice-width, initial-scale=1.0">
		<link href="css/boot/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster"/>
        <link rel="stylesheet" href="css/paginas.css" type="text/css">
        <link rel="stylesheet" href="css/cabecalho.css" type="text/css">
        <link rel="stylesheet" href="css/cadastro.css" type="text/css">
        <link rel="stylesheet" href="css/rodape.css" type="text/css">
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/funcoes.js"></script>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
    </head>
    <body class="Centro clearfix">
        <?php require("Cabecalho.php");?>
        <section id="ContainerColunas">
            <!-- Registration form to be output if the POST variables are not set or if the registration script caused an error. -->
            <?php if (empty($MensagemDeErro) == false) { echo $MensagemDeErro; } ?>
            <!--<form action="<?php echo EscapeURL($_SERVER['PHP_SELF']); ?>" method="post" name="asd" id="asd">
                Usuário:		<input type="text" name="Login" id="NomeUsuario"/><br/>
                Tipo de Usuário:    <select name="TipoDeUsuario" id="TipoDeUsuario">
                                        <option value="Operador">Operador</option>
                                        <option value="Auditor">Auditor</option>
                                        <option value="Administrador">Administrador</option>
                                    </select><br/>
                Email:		<input type="text" name="Email" id="Email"/><br/>
                Senha:		<input type="password" name="Senha" id="Senha"/><br/>
                Confirme a senha:	<input type="password" name="ConfirmarSenha" id="ConfirmarSenha"/><br/>
                <input type="button" value="Registrar" onclick="return HashFormularioRegistro(this.form,
                                                                                            this.form.NomeUsuario,
                                                                                            this.form.Email,
                                                                                            this.form.Senha,
                                                                                            this.form.ConfirmarSenha);"/>
            </form>-->
            <div id="Formulario">
                <h1>Registre-se</h1>
                <p class="Requerido Direita">* Campos Requeridos</p><br/>
                <form action="<?php echo EscapeURL($_SERVER['PHP_SELF']); ?>" method="post" name="FormularioDeCadastro">
                   <div class="ContainerDeCampos">    
                        <div class="LinhaFormulario"> 
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_usuario" id="lbl_usuario"><span class="Requerido">*</span> Usuário</label></div>
                                <div class="ColunaInput"><input id="txt_usuario" name="txt_usuario" type="text" aria-labelledby="lbl_usuario" autocomplete="off" maxlength="60" title="Nome usado para login. Campo necessário." autofocus required/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="cbo_tipodeusuario" id="lbl_tipodeusuario"><span class="Requerido">*</span> Tipo de Usuário</label></div>
                                <div class="ColunaInput">
                                    <div class="Seletor">
                                        <span class="SeletorDefault"></span>
                                        <select id="cbo_tipodeusuario" name="cbo_tipodeusuario" class="CaixaDeSelecao"  aria-labelledby="lbl_tipodeusuario" title="Tipo de Usuário. Campo requerido.">
                                            <option class="TextoDefault">-- Selecione --</option>
                                            <option value="Paciente">Paciente</option>
                                            <option value="Nutricionista">Nutricionista</option>
                                            <option value="TecnicoExterno">Recepcionista</option>
                                        </select>
                                        <script type="text/javascript">CaixaDeSelecao($('.TextoDefault').text(), $('.SeletorDefault'), $('.CaixaDeSelecao'));</script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="pwd_senha" id="lbl_senha"><span class="Requerido">*</span> Senha</label></div>
                                <div class="ColunaInput"><input id="pwd_senha" name="pwd_senha" aria-labelledby="lbl_senha" type="password" autocomplete="off" maxlength="20" title="Senha para login. Campo requerido." required/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="pwd_confirmarsenha" id="lbl_confirmarsenha"><span class="Requerido">*</span> Confirmar Senha</label></div>
                                <div class="ColunaInput"><input id="pwd_confirmarsenha" name="pwd_confirmarsenha" aria-labelledby="lbl_confirmarsenha" type="password" autocomplete="off" maxlength="20" title="Confirmar senha para login. Campo requerido." required/></div>
                            </div>
                        </div>
                    </div>
                    <div class="ContainerDeCampos">
                        <div class="LinhaFormulario">
                            <div class="ColunaInteira">
                                <div class="ColunaLabel"><label for="txt_nomecompleto" id="lbl_nomecompleto"><span class="Requerido">*</span> Nome Completo</label></div>
                                <div class="ColunaInput"><input id="txt_nomecompleto" name="txt_nomecompleto" type="text" aria-labelledby="lbl_nomecompleto" maxlength="120" title="Nome Completo. Campo requerido." required></div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="ColunaInteira">
                                <div class="ColunaLabel"><label for="txt_email" id="lbl_email">Email</label></div>
                                <div class="ColunaInput"><input id="txt_email" name="txt_email" type="email" aria-labelledby="lbl_email" maxlength="60"/></div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_cpf" id="lbl_cpf">CPF</label></div>
                                <div class="ColunaInput"><input id="txt_cpf" name="txt_cpf" type="text" aria-labelledby="lbl_cpf" maxlength="11"/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_rg" id="lbl_rg">RG</label></div>
                                <div class="ColunaInput"><input id="txt_rg" name="txt_rg" type="text" aria-labelledby="lbl_rg" maxlength="9"/></div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="ColunaInteira">
                                <div class="ColunaLabel"><label for="txt_datadenascimento" id="lbl_datadenascimento">Data de Nascimento</label></div>
                                <div class="ColunaInput"><input id="txt_datadenascimento" name="txt_datadenascimento" type="date" aria-labelledby="lbl_datadenascimento"/></div>
                            </div>
                        </div>
                    </div>
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
                    <div class="ContainerDeCampos">
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_celular1" id="lbl_celular1">Celular 1</label></div>
                                <div class="ColunaInput"><input id="txt_celular1" name="txt_celular1" type="text" aria-labelledby="lbl_residencial1" maxlength="10"/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_celular2" id="lbl_celular2">Celular 2</label></div>
                                <div class="ColunaInput"><input id="txt_celular2" name="txt_celular2" type="text" aria-labelledby="lbl_residencial2" maxlength="10"/></div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_residencial1" id="lbl_residencial1">Residencial 1</label></div>
                                <div class="ColunaInput"><input id="txt_residencial1" name="txt_residencial1" type="text" aria-labelledby="lbl_residencial1" maxlength="10"/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_residencial2" id="lbl_residencial2">Residencial 2</label></div>
                                <div class="ColunaInput"><input id="txt_residencial2" name="txt_residencial2" type="text" aria-labelledby="lbl_residencial2" maxlength="10"/></div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_comercial1" id="lbl_comercial1">Comercial 1</label></div>
                                <div class="ColunaInput"><input id="txt_comercial1" name="txt_comercial1" type="text" aria-labelledby="lbl_comercial1" maxlength="10"/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_ramal1" id="lbl_ramal1">Ramal 1</label></div>
                                <div class="ColunaInput"><input id="txt_ramal1" name="txt_ramal1" type="text" aria-labelledby="lbl_ramal1" maxlength="6"/></div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_comercial2" id="lbl_comercial2">Comercial 2</label></div>
                                <div class="ColunaInput"><input id="txt_comercial2" name="txt_comercial2" type="text" aria-labelledby="lbl_comercial2" maxlength="10"/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_ramal2" id="lbl_ramal2">Ramal 2</label></div>
                                <div class="ColunaInput"><input id="txt_ramal2" name="txt_ramal2" type="text" aria-labelledby="lbl_ramal2" maxlength="6"/></div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_nextel" id="lbl_nextel">Nextel</label></div>
                                <div class="ColunaInput"><input id="txt_nextel" name="txt_nextel" type="text" aria-labelledby="lbl_nextel" maxlength="11"/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_radioid" id="lbl_radioid">Rádio ID</label></div>
                                <div class="ColunaInput"><input id="txt_radioid" name="txt_radioid" type="text" aria-labelledby="lbl_radioid" maxlength="14"/></div>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_fax" id="lbl_fax">Fax</label></div>
                                <div class="ColunaInput"><input id="txt_fax" name="txt_fax" type="text" aria-labelledby="lbl_fax" maxlength="10"/></div>
                            </div>
                            <div class="MeiaColuna">
                                <div class="ColunaLabel"><label for="txt_outro" id="lbl_outro">Outro</label></div>
                                <div class="ColunaInput"><input id="txt_outro" name="txt_outro" type="text" aria-labelledby="lbl_outro" maxlength="11"/></div>
                            </div>
                        </div>
                    </div>
                    <div ID="StatusInferior">
                        <p>Retornar à <a href="./">página de login</a>.</p>
                    </div>
                    <div class="ContainerDeBotoes">
                        <div class="Botao"><input type="button" value="Enviar Cadastro" onclick="return HashFormularioRegistro(this.form,
                                                                                                            this.form.NomeUsuario,
                                                                                                            this.form.Email,
                                                                                                            this.form.Senha,
                                                                                                            this.form.ConfirmarSenha);"/>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <?php require("Rodape.php")?>
    </body>
</html>



