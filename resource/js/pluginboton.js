$.fn.btn_estados = function() {

    //  $(this).find('.form-actions').append('<input  type="reset" value="limpiar"/>');
    console.log($(this));
    /* ($(this).submit(function(e){
     e.preventDefault();
     
     $(this).find('input[type="submit"]').val("en proceso.....");       
     
     console.log($(this).find('input[type="submit"]'));
     
     });*/






};

$.fn.formulario = function(user_config) {
    var config = {
        data: function(el){
            return el.serializeArray();
        },
        success: function() {
        },
        complete: function() {
        }
    };
    if (typeof(user_config) === 'object')
        $.extend(config, user_config);

    this.each(function() {
        var $this = $(this);
        var $submit = $this.find('input[type="submit"]');
        var url = $.uri($this.attr('action'));
        var text = $submit.val();
        var classes = $submit.attr('class');
        $this.submit(function(e) {
            e.preventDefault();
            var data = config.data($this);
            $submit
                    .removeClass()
                    .addClass(classes + ' disabled')
                    .attr('disabled', true)
                    .val('Enviando...');
            $.ajax({
                url: url,
                dataType: 'json',
                data: data,
                type: 'post',
                success: function(r) {
                    if (r.status === 'success') {
                        $submit
                                .removeClass()
                                .addClass(classes)
                                .attr('disabled', false)
                                .val(text);
                    } else if (r.status === 'error') {
                        $submit
                                .removeClass()
                                .addClass('btn btn-danger')
                                .attr('disabled', false)
                                .val('Error : ' + r.msg);
                        setTimeout(function(e) {
                            $submit
                                    .removeClass()
                                    .addClass(classes)
                                    .attr('disabled', false)
                                    .val(text);
                        }, 3000);
                    }
                    config.success(r);
                },
                complete: config.complete,
                error: function() {
                    $submit
                            .removeClass()
                            .addClass('btn btn-danger')
                            .attr('disabled', false)
                            .val('Error de Servidor');
                    setTimeout(function(e) {
                        $submit
                                .removeClass()
                                .addClass(classes)
                                .attr('disabled', false)
                                .val(text);
                    }, 3000);
                }
            });
        });
    });
};