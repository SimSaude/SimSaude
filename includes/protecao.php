<?php
    include_once('includes/ConexaoBD.php');
    include_once('includes/FuncoesDeSeguranca.php');

    IniciarSessaoSegura();
    
    /*if (ChecarLogin($ConexaoSQL) == false)
    {
        header('Location: ./?Erro=2');
    }*/