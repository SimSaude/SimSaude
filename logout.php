<?php
    include_once('includes/FuncoesDeSeguranca.php');
    IniciarSessaoSegura();

    //Desfaz todos os valores da sessão.
    $_SESSION = array();

    //Obtém os parâmetros da sessão.
    $Parametros = session_get_cookie_params();

    //Deleta o cookie em uso. 
    setcookie(session_name(), '', time() - 42000, $Parametros["path"], $Parametros["domain"], $Parametros["secure"], $Parametros["httponly"]);

    //Destrói a sessão.
    session_destroy ();
    header          ('Location: ./');