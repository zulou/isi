<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('login_view');
    }

    function check() {

        $this->load->view('login_view');
    }

    function checklogin() {


        $this->load->model('login_model');
        //$usuario = $post('usuario');
        $usuario = $_POST['usuario'];
        //$password = $this->input->post('password');        
        $password = $_POST['password'];

        
        $log = $this->login_model->loginapp($usuario, $password);

        while ($fila = mysql_fetch_array($log)) {
            $key = $fila['pk_usuario'];
        }
        if ($log) {

            echo json_encode(array(
                'status' => "success"
            ));
        } else {
            echo json_encode(array(
                'status' => "denied"
            ));
        }
    }

}