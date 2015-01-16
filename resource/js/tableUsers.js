$(function() {
    $('#table').dataTable({
        'oLanguage': $.tableSpanish,
        'sDom': '<<"toolbar">f>tip',
        'oPagination': 'full_numbers'
    });

    var agregar = $('<a>', {
        'class': 'btn btn-primary',
        'href': $.uri('main/usuario/user/newUser')
    }).text('Agregar Usuario');

    $('.toolbar').css('float', 'right').append(agregar);
});