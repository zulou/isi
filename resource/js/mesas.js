$(function(){
    $(document).ready(function() {
        $('#tabla-mesas').dataTable();
    });

    $('#btn-nuevo-ambiente').click(function(e){
        e.preventDefault();
        $('#dialogo1').modal('show');
    });
    
});