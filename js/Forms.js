function FormularioHash(Formulario, Senha)
{
    //Crie um novo elemento de input, o qual será o campo para a senha com hash. 
    var Hash = document.createElement("input");
 
    //Adicione um novo elemento ao nosso Formularioulário. 
    Formulario.appendChild(Hash);
    Hash.name = "Hash";
    Hash.type = "hidden";
    Hash.value = hex_sha512(Senha.value);
 
    //Certificar-se de que a senha em texto simples não seja enviada. 
    Senha.value = "";
 
    //Finalmente, envie o Formularioulário. 
    Formulario.submit();
}
 
function HashFormularioRegistro(Formulario, NomeUsuario, Email, Senha, ConfirmarSenha)
{
    // Confira se cada campo tem um valor
    if (NomeUsuario.value == '' || 
        Email.value == '' || 
        Senha.value == '' || 
        ConfirmarSenha.value == '')
    {
        alert('É necessário cumprir com os requisitos listados. Tente novamente.');
        return false;
    }
    
 
    //Verifique o nome de usuário
    var re = /^\w+$/; 
    if(!re.test(Formulario.NomeUsuario.value))
    { 
        alert('O usuário deve conter somente letras, números e underlines "_". Tente novamente.'); 
        Formulario.NomeUsuario.focus();
        return false; 
    }
    
 
    //Confira se a senha é comprida o suficiente (no mínimo 6 caracteres).
    //A verificação é duplicada abaixo, mas o cNomeUsuarioado extra é para dar mais 
    //orientações específicas ao usuário.
    if (Senha.value.length < 6)
    {
        alert('A senha deve conter pelo menos 6 caracteres. Tente novamente.');
        Formulario.Senha.focus();
        return false;
    }
 
    //Pelo menos um número, uma letra minúscula e outra maiúscula.
    //Pelo menos 6 caracteres.
 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(Senha.value))
    {
        alert('A senha deve conter pelo menos um número, uma letra maiúscula e uma letra minúscula. Tente novamente.');
        return false;
    }
 
    //Verificar se a senha e a ConfirmarSenhairmação são as mesmas.
    if (Senha.value != ConfirmarSenha.value)
    {
        alert('As senhas não conferem. Por favor, tente novamente.');
        Formulario.Senha.focus();
        return false;
    }
 
    //Crie um novo elemento de input, o qual será o campo para a senha com hash. 
    var p = document.createElement("input");
 
    //Adicione o novo elemento ao nosso Formularioulário. 
    Formulario.appendChild(p);
    p.name  = "P";
    p.type  = "hidden";
    p.value = hex_sha512(Senha.value);
 
    //CNomeUsuarioado para não deixar que a senha em texto simples não seja enviada. 
    Senha.value  = "";
    ConfirmarSenha.value      = "";
 
    //Finalizando, envie o Formularioulário.  
    Formulario.submit();
    return true;
}