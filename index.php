<!DOCTYPE html>
<?php
/*
    Criar página sobre.
    Criar página de ajuda.
	Layout para 768x1024
	Layout para 800x1280
	Layout para 980x1280
	Layout para 1280x6004
	Layout para 1920x900
	Botões da página de login responsivos.
	Corrigir favicon
	Esticar itens do rodapé em resoluções W maiores que 360p.
*/
    include_once('includes/ConexaoBD.php');
    include_once('includes/FuncoesDeSeguranca.php');

    IniciarSessaoSegura();

    if (ChecarLogin($ConexaoSQL) == true)
    {
        $Logado = "<a href='./Inicial.php' style='text-decoration: none; color: green;' title='Entrar no Sistema'>já está</a>";
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
		<link href="css/boot/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body class="Centro clearfix">
        <?php $ExibirMenus = false; $ExibirNomeSistema = false; require("Cabecalho.php"); ?>   
        <section id="ContainerColunas">
            <div id="ContainerFormularioLogin">
                <h1>Login</h1>
                <p class="Estado" >Você <?php echo $Logado ?> logado no momento.</p><br/>
                <form action="includes/ProcessarLogin.php" method="post" name="FormularioLogin" id="FormularioLogin">
                    <div class="ContainerDeCampos">
                        <div class="LinhaFormulario">
                            <div class="Campo">
                                <input type="text" name="Login" id="Login" autocomplete="on" maxlength="60" placeholder="      Seu login" required autofocus/>
                            </div>
                        </div>
                        <div class="LinhaFormulario">
                            <div class="Campo">
                                <input type="password" name="Senha" id="Senha" maxlength="20" placeholder="      Sua senha" required/>
                            </div>
                        </div>
                    </div> <!-- ContainerDeCampos -->
                    <div ID="Status" class="Status"> 
                        <?php
                        if (isset($_GET['Erro']))
                        {
                            switch ($_GET['Erro'])
                            {
                                case 1:
                                    echo '<p class="Erro">   Erro ao fazer login.</p>';
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
            <!--<div class="Botao">
                <input type="button" id="Cadastro" class="ComImagem" value="É novo por aqui? Cadastre-se!" title="Cadastrar-se no Sistema" onclick="document.location.href='./Cadastro.php'"/>
            </div>-->
			<!--
            <div class="Botao" style="margin-top:5%;">
                <input type="button" id="Ajuda" class="ComImagem" value="Precisa de ajuda?" title="Ajuda sobre o sistema" onclick="document.location.href='./'"/>
            </div>
            <div class="Botao">
                <input type="button" id="Sobre" class="ComImagem" value="Quer saber mais sobre nós?" title="Sobre o grupo Sim + Saúde" onclick="document.location.href='./'"/>
            </div>
			-->
			
			<div id="Botao" class="Botao">
 
            <div class="btn-group" >
                <button class="btn btn-warning" title="Cadastre-se, é rapidinho!" onclick="document.location.href='./Cadastro.php'"> <span class="glyphicon glyphicon-ok-sign"  ></span> &nbsp &nbsp  É novo por aqui? Cadastre-se.</button>
            </div>

            <div class="btn-group">
                <button class="btn btn-success" title="Ajuda sobre o sistema" onclick="location.href='Ajuda.html'"> <span class="glyphicon glyphicon-question-sign"  ></span> &nbsp &nbsp Precisa de Ajuda? Clique aqui.</button>
            </div>

            <div class="btn-group">
                <button class="btn btn-danger" title="Sobre o grupo Sim + Saúde" onclick="location.href='SaibaMaisSobreNos.html'"> <span class="glyphicon glyphicon-info-sign"  ></span> &nbsp &nbsp Quer saber mais sobre nós?</button>
            </div>
        
</div>  
					
        </section>
        <?php require("Rodape.php")?>
    </body>
</html>