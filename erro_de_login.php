<?php
    $Erro = filter_input(INPUT_GET, 'Erro', $filter = FILTER_SANITIZE_STRING);
    if (! $Erro)
    {
        $Erro = 'Um erro desconhecido ocorreu.';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Erro de Login teste</title>
    </head>
    <body >
        <h1>Houve um problema?</h1>
        <p class="Erro"><?php echo $Erro; ?></p>  
    </body>
</html>