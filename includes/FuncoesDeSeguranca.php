<?php
include_once('psl-config.php');
 
function IniciarSessaoSegura()
{
    //Estabeleça um nome personalizado para a sessão.
    $NomeDaSessao   = 'simsaude_sessao_segura';
    $Secure         = SECURE;
    //Isso impede que o JavaScript possa acessar a identificação da sessão.
    $HTTPOnly       = true;
    //Assim você força a sessão a usar apenas cookies. 
    if (ini_set('session.use_only_cookies', 1) === false)
    {
        header("Location: ../Erro.php?Erro=Não foi possível iniciar uma sessão segura. (ini_set)");
        exit();
    }
    //Obtém params de cookies atualizados.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params(
            $cookieParams["lifetime"],
            $cookieParams["path"],
            $cookieParams["domain"],
            $Secure,
            $HTTPOnly);
    //Estabelece o nome fornecido acima como o nome da sessão.
    session_name            ($NomeDaSessao);
    session_start           (); //Inicia a sessão PHP.
    session_regenerate_id   (); //Recupera a sessão e deleta a anterior. 
}

function Login($Login, $Senha, $ComandoSQL)
{
    //Usando definições pré-estabelecidas significa que a injeção de SQL não é possível. 
    if ($stmt = $ComandoSQL->prepare("SELECT * FROM tbl_usuarios WHERE Login = ? LIMIT 1"))
    {
        $stmt->bind_param   ('s', $Login);   //Relaciona  "$Login" ao parâmetro.
        $stmt->execute      ();              //Executa a tarefa estabelecida.
        $stmt->store_result ();

        //Obtém variáveis a partir dos resultados. 
        $stmt->bind_result($ID, $Login, $SenhaBD, $Salt, $TipoUsuario);
        $stmt->fetch();

        //Faz o hash da senha com um salt excusivo.
        $Senha = hash('sha512', $Senha . $Salt);
        if ($stmt->num_rows == 1)
        {
            //Caso o usuário exista, conferimos se a conta está bloqueada
            //devido ao limite de tentativas de login ter sido ultrapassado 
            if (ChecarBrute($ID, $ComandoSQL) > 5)
            {
                //A conta está bloqueada.
                //Envia um email ao usuário informando que a conta está bloqueada.
                return false;
            }
            else
            {
                //Verifica se a senha confere com o que consta no banco de dados
                //a senha do usuário é enviada.
                if ($SenhaBD === $Senha)
                {
                    //A senha está correta.
                    $NomeCompleto           = "";
                    $BrowserUsuario         = $_SERVER['HTTP_USER_AGENT'];
                    $ID                     = preg_replace("/[^0-9]+/", "", $ID);
                    $_SESSION['ID']         = $ID;
                    //Proteção XSS conforme imprimimos este valor.
                    $Login                  = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $Login);
                    $_SESSION['Login']      = $Login;
                    $_SESSION['HashSalt']   = hash('sha512', $Senha . $BrowserUsuario);
                    //Adquirir Nome Completo do Usuário.
                    if ($stmt = $ComandoSQL->prepare("SELECT NomeCompleto FROM tbl_dadosusuarios WHERE ID = ? LIMIT 1"))
                    {
                        $stmt->bind_param   ('s', $ID);
                        $stmt->execute      ();
                        $stmt->store_result ();
                        $stmt->bind_result  ($NomeCompleto);
                        $stmt->fetch();
                        $_SESSION['NomeCompleto'] = $NomeCompleto;
                    }
                    return true; //Login concluído com sucesso.
                }
                else
                {
                    //A senha não está correta.
                    //Registramos essa tentativa no banco de dados.
                    $Agora = time();
                    $ComandoSQL->query("INSERT INTO tbl_tentativaslogin(ID, DataHora) VALUES ('$ID', '$Agora')");
                    return false;
                }
            }
        } else { return false; /*Usuário não existe.*/ }
    }
}

function ChecarBrute($ID, $ComandoSQL)
{
    //Registra a hora atual.
    $Agora = time();
 
    //Todas as tentativas de login são contadas dentro do intervalo das últimas 2 horas. 
    $TentativasValidas = $Agora - 7200;
 
    if ($stmt = $ComandoSQL->prepare("SELECT DataHora FROM tbl_tentativaslogin WHERE ID = ? AND DataHora > '$TentativasValidas'"))
    {
        $stmt->bind_param('i', $ID);
 
        //Executa a tarefa pré-estabelecida. 
        $stmt->execute      ();
        $stmt->store_result ();
 
        //Retornar número de tentativas.
        return $stmt->num_rows;
    }
}

function ChecarLogin($ComandoSQL)
{
    //Verifica se todas as variáveis das sessões foram definidas.
    if (isset($_SESSION['ID'], $_SESSION['Login'], $_SESSION['HashSalt']))
    {
        $ID             = $_SESSION['ID'];
        //$Login        = $_SESSION['Login'];
        $HashSalt       = $_SESSION['HashSalt'];
        $Senha          = "";
        $BrowserUsuario = $_SERVER['HTTP_USER_AGENT']; //Pega a string do usuário.

        if ($stmt = $ComandoSQL->prepare("SELECT Senha FROM tbl_usuarios WHERE id = ? LIMIT 1"))
        {
            $stmt->bind_param   ('i', $ID);
            $stmt->execute      ();
            $stmt->store_result ();
            if ($stmt->num_rows == 1)
            {
                //Caso o usuário exista, pega variáveis a partir do resultado.
                $stmt->bind_result($Senha);
                $stmt->fetch();
                $NovoHashSalt = hash('sha512', $Senha . $BrowserUsuario);
                if ($NovoHashSalt === $HashSalt) { return true; /*Logado.*/ }
                else { return false; } 
            }
            else { return false; } 
        }
        else { return false; }
    }
    else { return false; }
}

function EscapeURL($URL)
{
    if ($URL == '')
    {
        return $URL;
    }
 
    $URL    = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $URL);
    $strip  = array('%0d', '%0a', '%0D', '%0A');
    $URL    = (string) $URL;
    
    $count  = 1;
    while ($count)
    {
        $URL = str_replace($strip, '', $URL, $count);
    }
 
    $URL = str_replace	(';//', '://', $URL);
    $URL = htmlentities	($URL);
    $URL = str_replace	('&amp;', '&#038;', $URL);
    $URL = str_replace	("'", '&#039;', $URL);

    if ($URL[0] !== '/')
    {
        //Estamos interessados somente em links relacionados provenientes de $_SERVER['PHP_SELF'].
        return ('');
    }
    else
    {
        return ($URL);
    }
}