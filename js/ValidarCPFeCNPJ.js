/*
 ValidarCPFouCNPJ
 
 Valida o CPF ou CNPJ.
 
 @access public.
 @return bool true para válido, false para inválido.
*/
function ValidarCPFouCNPJ(_Valor)
{
    var _Tipo = VerificarCPFeCNPJ(_Valor);
    _Valor = _Valor.toString();
    _Valor = _Valor.replace(/[^0-9]/g, '');
    if (_Tipo === 'CPF')
    {
        return ValidarCPF(_Valor); //Retorna true para cpf válido.
    }   
    else if (_Tipo === 'CNPJ')
    {
        return ValidarCNPJ(_Valor); //Retorna true para CNPJ válido.
    } 
    return false;
}

/*
 ValidarCPFouCNPJ
 
 Valida o CPF ou CNPJ.
 
 @access privado.
 @return o tipo de entrada, false para inválido.
*/
function VerificarCPFeCNPJ(_Valor)
{
    _Valor = _Valor.toString();
    _Valor = _Valor.replace(/[^0-9]/g, '');
    if (_Valor.length < 15)
    {
        if (_Valor.length === 11)
        {
            return 'CPF';
        }
        else if (_Valor.length === 14)
        {
            return 'CNPJ';
        }
    }
    return false;
}

/*
 CalcularDigitosEPosicoes
 
 Multiplica dígitos vezes posições.
 
 @param string digitos Os digitos desejados.
 @param string posicoes A posição que vai iniciar a regressão.
 @param string soma_digitos A soma das multiplicações entre posições e dígitos.
 @return string Os dígitos enviados concatenados com o último dígito.
*/
function CalcularDigitosEPosicoes(_Digitos, _Posicoes, _SomaDosDigitos)
{
    if (typeof(_Posicoes)       === 'undefined') { _Posicoes        = 10; }
    if (typeof(_SomaDosDigitos) === 'undefined') { _SomaDosDigitos  = 0;  }
   
    _Digitos = _Digitos.toString();
    //Soma dos dígitos com a posição.
    for (var _Contagem = 0; _Contagem < _Digitos.length; _Contagem++)
    {
        //Preenche a soma com o dígito vezes a posição.
        _SomaDosDigitos = _SomaDosDigitos +(_Digitos[_Contagem] * _Posicoes);
        _Posicoes--;
        //Parte específica para CNPJ.
        if (_Posicoes < 2)
        {
            _Posicoes = 9; //Retornar à posição 9.
        }
    }
    _SomaDosDigitos = _SomaDosDigitos % 11;
    if (_SomaDosDigitos < 2)
    {
        _SomaDosDigitos = 0;
    }
    else
    {
        _SomaDosDigitos = 11 - _SomaDosDigitos; //Se for maior que 2, o resultado é 11 menos SomaDosDigitos.
    }
    var _CPF = _Digitos + _SomaDosDigitos; //Concatena mais um dígito aos primeiro nove dígitos.
    return _CPF;
}

/*
 ValidarCPF
 
 Valida se for CPF.
 
 @param  string cpf O CPF com ou sem pontos e traço.
 @return bool True para CPF correto - False para CPF incorreto.
*/
function ValidarCPF(_Valor)
{
    _Valor = _Valor.toString();
    _Valor = _Valor.replace(/[^0-9]/g, '');
    var _Digitos = _Valor.substr(0, 9); //Captura os 9 primeiros dígitos do CPF.
    var _NovoCPF = CalcularDigitosEPosicoes(_Digitos); //Faz o cálculo dos 9 primeiros dígitos do CPF para obter o primeiro dígito.
    var _NovoCPF = CalcularDigitosEPosicoes(_NovoCPF, 11); //Faz o cálculo dos 10 dígitos do CPF para obter o último dígito.
    if (_NovoCPF === _Valor)
    {
        return true;
    }
    return false;   
}

/*
 ValidarCNPJ
 
 Valida se for um CNPJ.
 
 @param string cnpj.
 @return bool true para CNPJ correto.
*/
function ValidarCNPJ(_Valor)
{
    _Valor = _Valor.toString();
    _Valor = _Valor.replace(/[^0-9]/g, '');
    var _CNPJOriginal = _Valor;
    var _PrimeirosDigitos = _Valor.substr(0, 12); //Captura os primeiros 12 números do CNPJ.
    var _PrimeiroCalculo = CalcularDigitosEPosicoes(_PrimeirosDigitos, 5); //Faz o primeiro cálculo.
    var _SegundoCalculo = CalcularDigitosEPosicoes(_PrimeiroCalculo, 6); //O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6.
    var _CNPJ = _SegundoCalculo; //Concatena o segundo dígito ao CNPJ.
    if (_CNPJ === _CNPJOriginal)
    {
        return true;
    }
    return false;
}

/*
 FormatarCPFouCNPJ
 
 Formata um CPF ou CNPJ.

 @access public.
 @return string CPF ou CNPJ formatado.
*/
function FormatarCPFouCNPJ(_Valor)
{
    var _Formatado = false;
    var _Tipo = VerificarCPFeCNPJ(_Valor);
    _Valor = _Valor.toString();
    _Valor = _Valor.replace(/[^0-9]/g, '');
    if (_Tipo === 'CPF')
    {
        if (ValidarCPF(_Valor) === true)
        {
            //Aplica a máscara CPF ###.###.###-##
            _Formatado  = _Valor.substr(0, 3) + '.';
            _Formatado += _Valor.substr(3, 3) + '.';
            _Formatado += _Valor.substr(6, 3) + '-';
            _Formatado += _Valor.substr(9, 2) + '';
            
        }
    }
    else if (_Tipo === 'CNPJ')
    {
        if (ValidarCNPJ(_Valor) === true)
        {
            //Aplica a máscara CNPJ ##.###.###/####-##
            _Formatado  = _Valor.substr(0,  2) + '.';
            _Formatado += _Valor.substr(2,  3) + '.';
            _Formatado += _Valor.substr(5,  3) + '/';
            _Formatado += _Valor.substr(8,  4) + '-';
            _Formatado += _Valor.substr(12, 14) + '';
            
        }
    } 
    return _Formatado;
}