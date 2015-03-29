<?php
    include_once('psl-config.php'); //Já que functions.php não está incluso.
    $ConexaoSQL = new mysqli(Host, Usuario, Senha, BancoDeDados);