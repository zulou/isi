$(function(){
    /*function cargar(url){
        $('#contenedor').load(url);
    }
    cargar('main/usuario/newUser/newUser');*/
   
   $('#new_user_submenu').click(function(e){
       e.preventDefault();
       $('#contenedor').load('main/usuario/user/newUser');
   });
   $('#list_users_submenu').click(function(e){
       e.preventDefault();
       $('#contenedor').load('main/usuario/user/listUsers');
   });
    $('.admin_mesas_menu').click(function(e){
        e.preventDefault();
        $('#contenedor').load('main/mesas/mesa/adminMesas');
    });
    $('.new_platos_menu').click(function(e){
        e.preventDefault();
        $('#contenedor').load('main/productos/productos/adminProductos');
    });
});