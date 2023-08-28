<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cliente extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cliente_model');

        //Carga la librería de form_validation
        $this->load->library(array('form_validation'));
    }

    public function login()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $login = $this->Cliente_model->get_usuario_by_email($_POST);

            if ($login) {
                $arrayUser = array(
                    'idCliente'        => $login->idCliente,
                    'nombre'           => $login->nombre,
                    'email'            => $login->email,
                );
                $this->session->set_userdata($arrayUser);
            } else {
                header("HTTP/1.1 400 Bad Request");
                return FALSE;
            }
        }
    }

    public function perfil()
    {
        $msg = 'false';
        echo $msg;
        die();
        //TODO: HACER FUNCION LUEGO DE INICIAR SESION
    }

    public function register()
    {
        //TODO: HACER FUNCION PARA REGISTRAR CLIENTE

    }

    public function nuevo()
    {
        var_dump('hola');
    }
    public function logout()
    {
        $this->session->unset_userdata('idCLiente');
        session_destroy();
        redirect(base_url());
    }
}
