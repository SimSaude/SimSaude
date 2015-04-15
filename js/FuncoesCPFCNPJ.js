$(function()
{
    //Validar cpf ou cnpj a cada tecla pressionada.
    var _Temporizador = false;
    $('.CPFouCNPJ').keypress(function()
    {
        var _Entrada = $(this);
        if (_Temporizador === true) //Limpar o temporizador antigo.
        {
            clearTimeout(_Temporizador);
        }
        //Criar um novo temporizador de meio segundo.
        _Temporizador = setTimeout(function()
        {
            _Entrada.removeClass('CPFouCNPJValido');
            _Entrada.removeClass('CPFouCNPJInvalido');
            if (ValidarCPFouCNPJ(_Entrada.val()) !== false)
            {
                _Entrada.addClass('CPFouCNPJValido');
            }
            else
            {
                _Entrada.addClass('CPFouCNPJInvalido');
            }
        }, 110);
    });
});

$(function()
{
    $('.CPFouCNPJ').blur(function()
    {
        var _CPFouCNPJ = $(this).val();
        if (FormatarCPFouCNPJ(_CPFouCNPJ) !== false)
        {
            $(this).val(FormatarCPFouCNPJ(_CPFouCNPJ));
            $(this).removeClass('CPFouCNPJValido');
            $(this).removeClass('CPFouCNPJInvalido');
            if (ValidarCPFouCNPJ(_CPFouCNPJ) !== false)
            {
                $(this).addClass('CPFouCNPJValido');
            }
            else
            {
                $(this).addClass('CPFouCNPJInvalido');
            }
            return true;
        }
        alert('CPF ou CNPJ inválido.');
        return false;
    });
});