<?php
    include_once('psl-config.php');    
    include_once('ConexaoBD.php');
    
    $MensagemDeErro = "";

    if (isset($_POST['Login'], $_POST['Email'], $_POST['TipoDeUsuario'], $_POST['Hash']))
    {
        //Limpa e valida os dados passados.
        $Login          = filter_input  (INPUT_POST , 'Login'           , FILTER_SANITIZE_STRING);
        $Email          = filter_input  (INPUT_POST , 'Email'           , FILTER_SANITIZE_EMAIL);
        $Email          = filter_var    (             $Email            , FILTER_VALIDATE_EMAIL);
        $TipoUsuario    = filter_input  (INPUT_POST , 'TipoDeUsuario'   , FILTER_SANITIZE_STRING);
        
        if (filter_var($Email, FILTER_VALIDATE_EMAIL) == false)
        {
            //Email inválido.
            $MensagemDeErro .= '<p class="Erro">O endereço de email digitado não é válido.</p>';
        }

        $Senha = filter_input(INPUT_POST, 'P', FILTER_SANITIZE_STRING);
        if (strlen($Senha) != 128)
        {
            //A senha com hash deve ter 128 caracteres.
            //Caso contrário, algo muito estranho está acontecendo.
            $MensagemDeErro .= '<p class="Erro">Configurações de senha inválidas.</p>';
        }

        //O nome de usuário e a validade da senha foram conferidas no lado cliente.
        //Não deve haver problemas nesse passo já que ninguém ganha violando essas regras.
        $prep_stmt = "SELECT Email FROM tbl_dadosusuarios WHERE Email = ? LIMIT 1";
        $stmt      = $ConexaoSQL->prepare($prep_stmt);

        if ($stmt) 
        {
            $stmt->bind_param   ('s', $Email);
            $stmt->execute      ();
            $stmt->store_result ();

            if ($stmt->num_rows == 1)
            {
                //Um usuário com esse email já existe.
                $MensagemDeErro .= '<p class="Erro">O email informado já está em uso.</p>';
            }
        }
        else
        {
            $MensagemDeErro .= '<p class="Erro">Erro no banco de dados.</p>';
        } 

        //LISTA DE TAREFAS: 
        //Precisamos bolar soluções para quando o usuário não tem direito a se registrar, 
        //verificando que tipo de usuário está tentando realizar a operação.

        if (empty($MensagemDeErro) == true)
        {
            //Crie um sal aleatório.
            $SaltRandomico  = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
            //Crie uma senha com sal.
            $Senha          = hash('sha512', $Senha . $SaltRandomico);

            //Inserir o novo usuário no banco de dados.
            if ($insert_stmt = $ConexaoSQL->prepare("INSERT INTO tbl_usuarios (Login, Senha, Salt, Tipo_Usuario) VALUES (?, ?, ?, ?);"))                 
            {
                $insert_stmt->bind_param('ssss', $Login, $Senha, $SaltRandomico, $TipoUsuario);
                //Executar a tarefa pré-estabelecida.
                if ($insert_stmt->execute() == true)
                {
                    if ($insert_stmt = $ConexaoSQL->prepare("INSERT INTO tbl_dadosusuarios (ID, Email) VALUES (LAST_INSERT_ID(), ?);"))
                    {
                        $insert_stmt->bind_param('s', $Email);
                        //Executar a tarefa pré-estabelecida.
                        if ($insert_stmt->execute() == false)
                        {
                            header('Location: ../Erro.php?Erro=Falha ao inserir dados para o registro.');
                        }
                    }
                    header('Location: ./RegistradoComSucesso.php');
                } 
            } 
        }
    }