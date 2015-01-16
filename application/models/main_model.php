<?php
class Main_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }   
    
   function registro_persona($nombre,$ap_pat,$ap_mat,$fecha_nac,$direccion,$telefono){
     return mysql_query("insert into persona (nombres,ap_paterno,ap_materno,fecha_nacimiento,telefono,direccion)values('$nombre','$ap_pat','$ap_mat','$fecha_nac','$direccion','$telefono')");
   } 
}
?>
