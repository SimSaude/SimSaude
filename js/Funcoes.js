function CaixaDeSelecao(TextoDefault, SeletorDefault, CaixaDeSelecao)
{
    //$('.defualt-text').text();
    //$('.selectDefault')
    //$('.selectBox')
    
    SeletorDefault.text(TextoDefault);
    CaixaDeSelecao.on('change', function()
    {
       var NovoTextoDefault = CaixaDeSelecao.find(":selected").text(); 
       SeletorDefault.text(NovoTextoDefault);
    });
};