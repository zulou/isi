<?php
class Service_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    public function login($usuario, $clave) {
        
        return mysql_query("SELECT pk_usuario,usuario FROM usuario WHERE usuario = '$usuario'AND password='$clave'");       
    }

    public function contactos($key, $usuario) {
        //return $this->db->query("select numero from persona inner join telefono on persona.pk_persona=telefono.pk_persona ");        
        return mysql_query("SELECT numero from persona LEFT JOIN telefono USING (pk_persona) WHERE pk_persona='$key' ");
        
        //mysql_connect("localhost", "root", "") or
        //        die("No se pudo conectar: " . mysql_error());
        //mysql_select_db("tisi_sms");
        //return mysql_query("SELECT numero FROM telefono");
    }
    
    
}

?>
