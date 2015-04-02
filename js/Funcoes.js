$(window).on('load resize', function()
{ 
    $('#ContainerColunas').css('height', window.innerHeight - 300.6 + 'px');
});

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

function checkNetConnection()
{
    jQuery.ajaxSetup({async:false});
    Conectado="";
    r=Math.round(Math.random() * 10000);
    $.get("../imagens/ponto.png",{subins:r},function(d)
    {
        Conectado=true;
    }).error(function(){
        Conectado=false;
    });
    return Conectado;
}