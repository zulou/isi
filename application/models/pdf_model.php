<?php

class Pdf_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function acta_nacimiento() {
        return mysql_query( "select 
    persona.nombres,
    persona.ap_paterno,
    persona.ap_materno,
    fecha_nacimiento,
    direccion
    
FROM
    persona
         INNER JOIN 
    acta_nacimiento ON (persona.pk_persona = acta_nacimiento.pk_persona OR persona.pk_persona=acta_nacimiento.pk_padre OR persona.pk_persona=acta_nacimiento.pk_madre)
where
    acta_nacimiento.pk_nacimiento=1;
");
    }
    
    

}

?>
