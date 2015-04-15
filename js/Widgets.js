/*Widgets*/
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