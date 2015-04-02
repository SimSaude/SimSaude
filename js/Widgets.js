/*Widgets*/
$(function()
{ 
    $("#datepicker").datepicker({
        dateFormat:         "dd-mm-yy",
        dayNames:           ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
        dayNamesMin:        ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
        dayNamesShort:      ["D", "S", "T", "Q", "Q", "S", "S"],
        monthNames:         ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
        monthNamesShort:    ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        weekHeader:         "S",
        showWeek:           true
    });
});

$(document).ready(function ()
{
    $("#dialog").dialog({
        title:          "Teste diálogo modal",
        closeText:      "Fechar",
        minHeight:      200,
        minWidth:       300,
        autoOpen:       true,
        resizable:      false,
        draggable:      true,
        modal:          true,
        closeOnEscape:  false,
        dialogClass:    "no-close",
        position:       {my: "center", at: "center", of: '#ContainerColunas'},
        hide:           { effect: "scale", duration: 500 },
        show:           { effect: "bounce", duration: 500 },
        buttons:        [{
                            text: "Ok",
                            //icons: {primary: "ui-icon-heart"},
                            click: function() { $( this ).dialog( "close" ); }
                        }],
        open: function(event, ui)
        {
            setTimeout("$('#dialog').dialog('close')", 2500);
        }
    });
    $('.ui-dialog').draggable("option", "containment", '#ContainerColunas'); 
});

$(function()
{
    $(".Coluna").sortable({
        connectWith:    ".Coluna",
        handle:         ".Portlet-titulo",
        cancel:         ".Portlet-permutar",
        placeholder:    "Portlet-placeholder ui-corner-all"
    });

    $(".Portlet")
        .addClass   ("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all")
        .find       (".Portlet-titulo")
        .addClass   ("ui-widget-header ui-corner-all")
        .prepend    ("<span class='ui-icon ui-icon-minusthick Portlet-permutar'></span>");

    $(".Portlet-permutar").click(function()
    {
        var icon = $(this);
        icon.toggleClass("ui-icon-minusthick ui-icon-plusthick");
        icon.closest    (".Portlet").find(".Portlet-conteudo").toggle();
    });
});