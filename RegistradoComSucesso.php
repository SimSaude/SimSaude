<?php
    include_once('includes/ConexaoBD.php');
    include_once('includes/Funcoes.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrado com sucesso.</title>
        <link rel="stylesheet" href="css/paginas.css"/>
    </head>
    <body>
        <h1>Registro concluído.</h1>
        <?PHP
        if (isset($TipoUsuario))
        {
            if ($TipoUsuario == "Nutricionista")
            {
                echo "<p>Você foi registrado como nutricionista.</p>";
            }
            else if ($TipoUsuario == "Recepcionista")
            {
                echo "<p>Você foi registrado como recepcionista.</p>";
            }
            else
            {
                echo "<p>Você foi registrado como paciente.</p>";
            }
        }
        ?>
        <p>Retornar à <a href="./">página de login</a>.</p>
    </body>
</html>