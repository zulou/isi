$(function() {
    var $login = $('#login');
    var $firstInput = $login.find('input:first');
    $firstInput.focus();
    $login.submit(function(e) {
        e.preventDefault();
        var $boton = $login.find('button');
        var $input = $login.find('input');
        var data = $login.serializeArray();
        $input.attr('disabled', false);
        $boton.addClass('disabled').html('<span class="icon-spinner"></span>&nbsp;&nbsp;Procesando...');
        $.ajax({
            url: ('http://localhost/registro_civil/index.php/login/checklogin'),
            data: data,
            dataType: 'Json',
            type: 'post',
            success: function(r) {
                if (r.status === 'success') {
                    
                    window.location.href = ('https://localhost/registro_civil/index.php/main/begin');   
                } else {
                    $boton.removeClass('disabled').html('<span class="icon-lock"></span>&nbsp;&nbsp;Incorrecto - Intente de nuevo');
                    $input.attr('disabled', false);
                    $firstInput.focus();    
                }
            },
            error: function() {
                alert("error");
                $boton.removeClass('disabled').html('<span class="icon-warning-sign"></span>&nbsp;&nbsp;Error de Servidor - Intente de nuevo');
                $input.attr('disabled', false);
                $firstInput.focus();
            },
            timeout: 10000
        });
    });
});