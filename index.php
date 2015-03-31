<!DOCTYPE html>
<?php
    include_once('includes/ConexaoBD.php');
    include_once('includes/FuncoesDeSeguranca.php');

    IniciarSessaoSegura();

    if (ChecarLogin($ConexaoSQL) == true)
    {
        $Logado = "<a href='./Inicial.php' title='Entrar no Sistema'>já está</a>";
    }
    else
    {
        $Logado = "<text style='color: red;'>não está</text>";
    }
?>
<html lang="pt-br"> 
    <head>
        <?php require("includes/SecaoHead.php"); ?>
        <link rel="stylesheet" href="css/login.css" type="text/css" rel="stylesheet">
        <script type="text/JavaScript" src="js/sha512.js"></script>
        <script type="text/JavaScript" src="js/forms.js"></script>
    </head>
    <body>
        <?php $ExibirMenus = false; require("Cabecalho.php"); ?>   
        <section id="ContainerColunas">
            <div id="ContainerFormularioLogin">
                <h1>Login</h1>
                <p class="StatusSuperior" >Você <?php echo $Logado ?> logado no momento.</p><br/>
                <form action="includes/ProcessarLogin.php" method="post" name="FormularioLogin" id="FormularioLogin">
                    <div class="ContainerDeCampos">
                        <div class="LinhaFormulario">
                            <div class="Campo">
                                <input type="text" name="Login" id="Login" autocomplete="on" maxlength="60" placeholder="Seu login" required autofocus/>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="Campo">
                                <input type="password" name="Senha" id="Senha" maxlength="20" placeholder="Sua senha" required/>
                            </div>
                        </div>
                    </div> <!-- ContainerDeCampos -->
                    <div ID="StatusInferior" class="Status"> 
                        <?php
                        if (isset($_GET['Erro']))
                        {
                            switch ($_GET['Erro'])
                            {
                                case 1:
                                    echo '<p class="Erro">Não foi possível realizar o login.</p>';
                                    break;
                                case 2:
                                    echo '<p class="Erro">Sem permissão. Faça Login.</p>';
                                    break;
                                case 3:
                                    echo '<p class="Erro">Usuário ou senha inválidos.</p>';
                                default:
                                    break;
                            }
                        }
                        ?>
                    </div>
                    <div class="ContainerDeBotoes">  
                        <div class="Botao">
                            <input type="button" value="Entrar" id="Entrar" class="ComImagem" title="Entrar no Sistema" onclick="<?php if (ChecarLogin($ConexaoSQL) == true){ echo "document.location.href='./Inicial.php'"; } else { echo "FormularioHash(this.form, this.form.Senha)"; }?>"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="Botao">
                <input type="button" id="Sobre" class="ComImagem" value="Quer saber mais sobre nós?" title="Sobre o grupo Sim + Saúde" onclick="document.location.href='SobreNos.php'"/>
            </div>
            <div class="Botao">
                <input type="button" id="Ajuda" class="ComImagem" value="Precisa de ajuda?" title="Ajuda sobre o sistema" onclick="document.location.href='Ajuda.php'"/>
            </div>
        </section>
        <?php require("Rodape.php")?>
    </body>
</html>