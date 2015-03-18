<?php
    include_once('ConexaoBD.php');
    include_once('FuncoesDeSeguranca.php');

    IniciarSessaoSegura();

    if (isset($_POST['Login'], $_POST['Hash']))
    {
        $NomeUsuario    = $_POST['Login'];
        $HashSenha      = $_POST['Hash']; //A senha em HASH.

        if (Login($NomeUsuario, $HashSenha, $ConexaoSQL) == true)
        {
            //Login com sucesso.
            header('Location: ../Inicial.php');
        }
        else
        {
            //Falha de login.
            header('Location: ../?Erro=1');
        }
    }
    else
    {
        //As variáveis POST corretas não foram enviadas para esta página. 
        echo "<!DOCTYPE html><html><head><meta charset='UTF-8'></head><body>Requisição Inválida.</body>";
    }