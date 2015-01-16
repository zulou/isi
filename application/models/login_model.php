<?php
class Login_model extends CI_Model{
     function __construct() {
        parent::__construct();
    }

  function loginapp($usuario, $clave) {

        return mysql_query("SELECT pk_usuario,usuario FROM usuario WHERE usuario = '$usuario'AND password='$clave'");
    }
}
?>
