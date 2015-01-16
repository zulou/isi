
<div class="row-fluid">
    <div class="span7">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="icon-table"></span> Registrar Persona
                </div>
            </div>
        </div>
        <div class="widget-body">
            <form id="form-proveedor-datos" class="form-horizontal no-margin"  >
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget">
                            <div class="widget-header">
                                <div class="title">
                                    <span class="icon-pencil-2"></span> Datos Persona
                                </div>
                            </div>
                            <div class="widget-body">

                                <div class="control-group ruc">
                                    <label class="control-label">Nombres:</label>
                                    <div class="controls">
                                        <input class="input-block-level" type="text" title="Ingrese el nombre" name="nombre" required='true' >
                                    </div>
                                </div>
                                <div class="control-group ruc">
                                    <label class="control-label">Apellido Paterno</label>
                                    <div class="controls">
                                        <input class="input-block-level" type="text" title="Ingrese el nombre" name="ap_pat" required='true' >
                                    </div>
                                </div>
                                <div class="control-group ruc">
                                    <label class="control-label">Apellido materno:</label>
                                    <div class="controls">
                                        <input class="input-block-level" type="text" title="Ingrese el apellido" name="ap_mat" required='true' >
                                    </div>
                                </div>
                                <div class="control-group ruc">
                                    <label class="control-label">Fecha de Nacimiento:</label>
                                    <div class="controls">
                                        <input class="input-block-level" type="text" title="Ingrese fecha" name="fecha_nacimiento" required='true' >
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Direccion:</label>
                                    <div class="controls">
                                        <input class="input-block-level" type="text"  name="direccion">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Telefono/cel:</label>
                                    <div class="controls">
                                        <input class="input-block-level" type="text"  pattern="^[0-9]{1,9}$" name="prove_telefono">
                                    </div>
                                </div>

                                <!--</form>-->
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-actions no-margin">

                    <button class="btn btn-primary" id="btn-registrar-persona">Registrar</button>
                    <button class="btn btn-default" id="cancelar-producto">Cancelar</button>
                </div>


        </div>
    </div>
</div>

<script>
    $(function() {

        $('#btn-registrar-persona').click(function(e) {
            e.preventDefault();
            var prov_datos = $('#form-proveedor-datos').serializeArray();
            //alert("clickme2");
            //console.log(prov_datos);            
            //var form = $('#form-proveedor-datos').each();
            var btn = this;
            //$(btn).attr("disabled", "disabled");
            $.ajax({
                url: 'https://localhost/registro_civil/index.php/main/registrar_persona',
                data: {'datos': prov_datos},
                dataType: 'Json',
                type: 'POST',
                success: function(res) {

                    if (res.state === 'success') {
                        //form.reset();
                        location.reload(true);
                    }
                }
            });
            $(btn).removeAttr("disabled");
        });





    }
    );
</script>