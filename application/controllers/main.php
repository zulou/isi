<?php

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {

        $this->load->view('dashboard_view');
    }

    function begin() {
        $this->load->view('header');
        $this->load->view('footer');
    }

    function registro_persona() {

        $this->load->view('header');
        $this->load->view('persona');
        $this->load->view('footer');
    }

    function registrar_persona() {

        $this->load->model('main_model');

        $data = $_POST['datos'];
        //nombre
        $nombre = $data[0]['value'];
        //ap_pat
        $ap_pat = $data[1]['value'];
        //ap_mat
        $ap_mat = $data[2]['value'];
        //fecha_nacimiento
        $fecha_nac = $data[3]['value'];
        //direccion
        $direccion = $data[4]['value'];
        //telefono
        $telefono = $data[5]['value'];
        $result = $this->main_model->registro_persona($nombre, $ap_pat, $ap_mat, $fecha_nac, $direccion, $telefono);
        
        if ($result) {
            
            echo json_encode(array(
                'success' => true
            ));
        } else {
            echo json_encode(array(
                'success'=>FALSE
            )
            );
        }
    }

    function acta_nacimiento() {

        $this->load->view('header');
        $this->load->view('acta_nacimiento');
        $this->load->view('footer');
    }

    function acta_matrimonio() {

        $this->load->view('header');
        $this->load->view('acta_nacimiento');
        $this->load->view('footer');
    }

}

?>
