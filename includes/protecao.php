<?php
    include_once('includes/ConexaoBD.php');
    include_once('includes/FuncoesDeSeguranca.php');

    IniciarSessaoSegura();
    
    if (SECURE == true)
    {
        if (ChecarLogin($ConexaoSQL) == false)
        {
            header('Location: ./?Erro=2');
        }
    }