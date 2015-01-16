$.fn.registroDatos = function() {
    
    
    $(this).submit(function(e) {    
        e.preventDefault();      

        var $this = $(this);
        var url = $(this).attr('action');        
        var $submit = $this.find('input[type="submit"]');
        var datos = $(this).serialize();
        var classes = $submit.attr('class');
        $(this).find('input[type="submit"]').val("En Proceso");        
        $.ajax({
            url: $.uri(url),
            data: datos,
            type: 'POST',
            dataType: 'Json',
            success: function(e) {                
 
                if (e.status == 'success') {                    

                    $this.find('input[type="submit"]')
                            .removeClass()
                            .addClass(classes)
                            .attr('disabled',false)
                            .val(e.msg);
                }
            },
            error: function(e) {        
                
                $this.find('input[type="submit"]')
                        .removeClass()
                        .addClass('btn btn-danger') 
                        .attr('disabled',false)
                        .val("ERROR");
                
                setTimeout(function(){
                    $submit.removeClass()
                           .addClass(classes)
                           .attr('disable',false)
                           .val($submit.val());
                    
                    
                },3000);
            }
        });
    });
};