var datos = [];
datos[0]={'nombre':'name0','cantidad':'10','precio':'5','id_prod':'2'};
datos[1]={'nombre':'name1','cantidad':'20','precio':'10','id_prod':'3'};
datos[2]={'nombre':'name2','cantidad':'10','precio':'10','id_prod':'4'};
//console.log(datos.length);


var max_id = 0;
var captura_eventos_cuenta = function(id) {
    $.ajax({
        url: $.uri('main/caja/caja/capturar_cuenta'),
        dataType: 'Json',
        type: 'POST',
        data: {'id': id},
        success: function(res) {
            if (res.status === 'success') {
                //console.log(res.eventos);
                for (var i = 0; i < res.eventos.length; i++) {
                    if (res.eventos[i].cuen_id > max_id)
                        max_id = res.eventos[i].cuen_id;
                    var datos = res.eventos[i].cuen_descripcion;
                    datos = JSON.parse(datos);
                    //console.log(datos);
                    var html = '<div id="cont_' + res.eventos[i].cuen_id + '" class="contenedor-cuentas-cobrar">\n\
                                  <div id="head_' + res.eventos[i].cuen_id + '" class="head-cobrar-cuentas"> <b>Mesa Nro:</b> <span class="label info-label label-important">' + res.eventos[i].grme_id + '</span> - <b>Ambiente:</b> <span class="label info-label label-important">' + res.eventos[i].ambi_nombre + '</span></div>\n\
                                     <div id="body_' + res.eventos[i].cuen_id + '" class="body-cobrar-cuentas">       \n\
                                        <div class="row-fluid">\n\
                                          <div class="span4">\n\
                                             <div class="widget">\n\
                                                        <div class="widget-header">\n\
                                                            <div class="title">\n\
                                                                <span class="icon-table"></span> Datos Cliente\n\
                                                            </div>\n\
                                                        </div>\n\
                                                        <div class="widget-body">\n\
                                                            <table>\n\
                                                                <tr><td class="tags"><b>Nombres: </b></td> <td class="valores">' + res.eventos[i].clie_nombres+'</td></tr>';
                                                                if(res.eventos[i].cuen_comprobante === 'boleta'){
                                                                    html+='<tr><td class="tags"><b>Apellidos: </b> </td><td class="valores">' + res.eventos[i].clie_apellidos + '</td></tr>\n\
                                                                           <tr><td class="tags"><b>DNI : </b></td><td class="valores"> ' + res.eventos[i].clie_dni+'</td></tr>';
                                                                }else{
                                                                    html+='<tr><td class="tags"><b>RUC: </b></td><td class="valores"> ' + res.eventos[i].clie_ruc+'</td></tr>';
                                                                }
                                                                html+='<tr><td class="tags"><b>Comprobante: </b></td><td class="valores"> ' + res.eventos[i].cuen_comprobante + '</td></tr>\n\
                                                                <tr><td class="tags"><b>Tipo Pago: </b></td><td class="valores"> ' + res.eventos[i].cuen_tipo_pago + '</td></tr>\n\
                                                                <tr><td class="tags"><b>Detalles: </b></td><td class="valores">' + res.eventos[i].cuen_detalle +'</td></tr>';
                                                                if(res.eventos[i].cuen_comprobante=='factura')
                                                                    html+='<tr><td class="tags"><b>Sub Total:</b></td><td class="valores"> <span id="subTotal_'+res.eventos[i].cuen_id+'">'+res.eventos[i].cuen_monto_pagado*0.82+'</span></td></tr><tr><td class="tags"><b>IGV:</b></td><td class="valores"><span id="IGV_'+res.eventos[i].cuen_id+'">'+res.eventos[i].cuen_monto_pagado*0.18+'</span></td></tr>';
                                                                html+='<tr><td class="tags"><b>Monto Pagado: </b></td><td class="valores"> s./<span id="montoTotal_'+res.eventos[i].cuen_id+'">'+ res.eventos[i].cuen_monto_pagado + '</span></td></tr>\n\
                                                            </table>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                                <div class="span8">\n\
                                                    <div class="widget">\n\
                                                        <div class="widget-header">\n\
                                                            <div class="title"><span class="icon-table"></span>Detalles pedidos</div>\n\
                                                        </div>\n\
                                                    <div class="widget-body">\n\
                                                        <table class=" listaProducts table  table-hover table-bordered pull-left">\n\
                                                            <thead><tr><th>Nombre</th><th>Cantidad</th><th>Precio s./</th><th>Total s./</th><th>Cortesia</th></tr></thead>\n\
                                                            <tbody>';
                                                                var sTotal=0;
                                                                for(var ii=0;ii<datos.length;ii++){
                                                                    html+='<tr><td>'+datos[ii].nombre+'</td><td data-cantidad="'+datos[ii].cantidad+'">'+datos[ii].cantidad+'</td><td>'+datos[ii].precio+'</td><td>'+datos[ii].cantidad * datos[ii].precio+'</td><td><input type="text" class="valor_cortesia input-block-level input-mini" data-selector="'+res.eventos[i].cuen_id+'" /></td></tr>';
                                                                    sTotal += datos[ii].cantidad * datos[ii].precio*1;
                                                                }
                                                            html+='<tr><td></td><td></td><td></td><td>s./ <span id="totalCuenta_'+res.eventos[i].cuen_id+'" style="background: #3D85C2;color: white;padding: 5px;border-radius: 5px;">'+sTotal+'</span></td><td>s/. <span style="background: #E84F4C;color: white;padding: 5px;border-radius: 5px;" id="totalCortesia_'+res.eventos[i].cuen_id+'">0.0</span></td></tr></tbody>\n\
                                                        </table>\n\
                                                        <div class="clearfix"></div>\n\
                                                    </div>\n\
                                                </div>\n\
                                               </div>\n\
                                            </div>\n\
                                            <div class="form-actions no-margin">\n\
                                                  <button data-cuenta="'+res.eventos[i].cuen_id+'" class="btn-cobrar-cuenta btn btn-primary" type="button">Atendido !</button>\n\
                                            </div>\n\
                                        </div>\n\
                                     </div>\n\
                                </div>\n\
                            </div>';
                    $('#mesas-pendientes').append(html);
                    //$('#btn-menu-caja').css('background','#E84F4C');
                }
            }
        },
        complete: function() {
            captura_eventos_cuenta(max_id);
        },
        timeout: 30000
    });
};

$('.head-cobrar-cuentas').click(function(){
   console.log(this); 
});
var remover;
$('body').on('click','.head-cobrar-cuentas',function(){
    remover = $(this).parent();
    if($('.body-cobrar-cuentas:visible').parent().attr('id') !== $(this).parent().attr('id')) {
        $('.body-cobrar-cuentas:visible').slideUp().prev().css('border-radius','8px');
        $(this).css('border-radius','8px 8px 0 0').next().slideDown();
    }
    else $('.body-cobrar-cuentas:visible').slideUp().prev().css('border-radius','8px');
});

$('body').on('click','.btn-cobrar-cuenta',function(){
    var cuenta = $(this).data('cuenta');
    $.ajax({
       url:$.uri('main/cuenta/cuenta/actualizar_desde_caja'),
       data: {'cuen_id':cuenta},
       type: 'POST',
       dataType:'Json',
       success: function(res){
           if(res.state === 'success'){
               remover.remove();
               //console.log($(remover).attr('id'));
           }
           else alert('Intente de nuevo..');
       }
    });
   
});

$('body').on('keyup','.valor_cortesia',function(tecla){
   var cantCort = $(this).val()*1;
   var total = $(this).parent().prev();
   var total_val = total.html()*1;
   var precio = total.prev();
   var precio_val = precio.html()*1;
   var cantidad = precio.prev();
   var cantidad_val = cantidad.html()*1;
   var cantidad_data = cantidad.data('cantidad');
   var cuentaTotal = $('#totalCuenta_'+$(this).data('selector')).html()*1;
   var cortesiaTotal = $('#totalCortesia_'+$(this).data('selector')).html()*1;
   
   
   cantidad.html(cantidad_data-cantCort);
   var totall = (cantidad_data-cantCort)*precio_val;
   total.html(totall.toFixed(2));
   cuentaTotal = cuentaTotal +(cantidad_data-cantidad_val-cantCort)*precio_val;
   cortesiaTotal = cortesiaTotal +(cantCort - cantidad_data+cantidad_val)*precio_val;
   
   $('#totalCuenta_'+$(this).data('selector')).html(cuentaTotal.toFixed(2));
   $('#totalCortesia_'+$(this).data('selector')).html(cortesiaTotal.toFixed(2));
   
   $('#montoTotal_'+$(this).data('selector')).html(cuentaTotal.toFixed(2));
   $('#IGV_'+$(this).data('selector')).html(cuentaTotal*0.18);
   $('#subTotal_'+$(this).data('selector')).html(cuentaTotal-(cuentaTotal*0.18));
});