var max_id = 0;
var captura_eventos = function(id) {
    $.ajax({
        url: $.uri('main/evento/evento/capturar_evento'),
        dataType: 'Json',
        type: 'POST',
        data: {'id': id},
        success: function(res) {
            if (res.status === 'success') {
                for (var i = 0; i < res.eventos.length; i++) {
                    if (res.eventos[i].even_id*1 > max_id){
                        //console.log(res.eventos[i].even_id);
                        max_id = res.eventos[i].even_id*1;
                    }
                    var tmp = $('#' + res.eventos[i].grme_id);
                    if (tmp.length !== 0) {
                        tmp = tmp.data('mesa_obj');
                        tmp.set_pos(res.eventos[i].px + 'px', res.eventos[i].py + 'px');
                        if (res.eventos[i].even_estado === 'disponible')
                            tmp.set_color('#1ABC9C');
                        else if (res.eventos[i].even_estado === 'ocupado')
                            tmp.set_color('#E84F4C');
                    }
                }
            }
        },
        complete: function() {
            captura_eventos(max_id);
        },
        timeout: 30000
    });
};
