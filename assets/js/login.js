$(function(){
    $('form').submit(function(e){
        e.preventDefault();
        var button = $('button[type=submit]');
        button.text('Cargando...').attr('disabled', true);
        //alert($.uri('prueba'));
        button.text('Ingresar').attr('disabled', false);
    });
});