<?php
    $Erro = filter_input(INPUT_GET, 'Erro', $filter = FILTER_SANITIZE_STRING);
    if (! $Erro) { $Erro = 'Houve um erro desconhecido.'; }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require("includes/SecaoHead.php"); ?>
        <link type="text/css" rel="stylesheet" href="css/PaginaDeErro.css" >
    </head>
    <body>
        <h1>Ops</h1>
        <p class="Erro"><?php echo $Erro; ?></p>
    </body>
</html>