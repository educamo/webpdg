<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        ## carga de	modelos
        $this->load->model(array('Admin_model'));

        $this->lang->load("Admin");
    }

    /**
     * función index
     * es la función encargada de cargar todo el contenido de la pagina
     *
     * @author César Carrasco <educamo@hotmail.com>
     *
     * @return void
     * @date: [2022/10/04]
     */
    public function index()
    {
        if ($this->session->userdata('userId')) {
            $datos = $this->Admin_model->dasboard();

            $this->plantilla();

            $this->load->view('administracion/main', $datos);

            $this->footer();
        } else {
            redirect(base_url('Admin/Login'));
        }
    }
    public function perfil()
    {
        if ($this->session->userdata('userId')) {
            $this->plantilla();
            $this->load->view('perfil');
            $this->footer();
        } else {
            redirect(base_url('Admin/Login'));
        }
    }
    public function Login()
    {

        if ($this->session->userdata('userId')) {
            redirect(base_url('Admin'));
        } else {
            $this->load->view('login');
        }
    }
    public function inciarSesion()
    {

        if (isset($_POST['user']) && isset($_POST['password'])) {
            $login = $this->Admin_model->loginUser($_POST);

            if ($login) {
                $arrayUser = array(
                    'userId'             => $login[0]->userId,
                    'userName'           => $login[0]->userName,
                    'mail'               => $login[0]->mail,
                    'rolId'              => $login[0]->rolId,
                );
                $this->session->set_userdata($arrayUser);
                redirect('admin');
            } else {
                $this->session->set_flashdata('status', lang('mensajeErrlogin'));
                redirect(base_url() . 'Admin/Login');
            }
        }
    }
    public function listSocial()
    {
        if ($this->session->userdata('userId')) {
            $data['redes'] = $this->Admin_model->getSocial();
            $this->plantilla();
            $this->load->view('listSocial', $data);
            $this->footer();
        } else {
            redirect(base_url('Admin/Login'));
        }
    }
    private function plantilla()
    {
        $datos['usuario'] = $this->session->userName;
        $this->load->view('administracion/head');
        $this->load->view('administracion/sidebar');
        $this->load->view('administracion/topbar', $datos);
    }
    private function footer()
    {
        $this->load->view('administracion/footer');
        $this->load->view('administracion/end');
    }
    public function logout()
    {

        $this->session->sess_destroy();

        redirect('Admin/Login');
    }
}
