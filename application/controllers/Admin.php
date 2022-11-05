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
        $datos = $this->Admin_model->dasboard();

        $this->plantilla();

        $this->load->view('administracion/main', $datos);

        $this->footer();
    }
    public function perfil()
    {
        $this->plantilla();
        $this->load->view('perfil');
        $this->footer();
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
    public function configContacto()
    {
        $configId = 'mailEmp';
        $data['config'] = $this->Admin_model->getConfig($configId);
        $this->plantilla();
        $this->load->view('configContacto', $data);
        $this->footer();
    }
    public function guardarContacto()
    {
        $usuarioModificacion = $this->session->userdata('userId');
        $ipModificacion = $_SERVER['REMOTE_ADDR'];
        $datos = array(
            'configId'              => $this->input->post('configId'),
            'configValue'           => $this->input->post('configValue'),
            'usuarioModificacion'   => $usuarioModificacion,
            'ipModificacion'        => $ipModificacion,
        );

        $r = $this->Admin_model->updateConfig($datos);

        echo json_encode($r);
        return true;
    }
    public function listSocial()
    {
        $data['redes'] = $this->Admin_model->getSocial();
        $this->plantilla();
        $this->load->view('listSocial', $data);
        $this->footer();
    }
    public function listModulos()
    {
        $data['modulos'] = $this->Admin_model->getModules();
        $this->plantilla();
        $this->load->view('listModulos', $data);
        $this->footer();
    }
    public function modificarModulo()
    {
        $filtro = "modificar";
        $data['modulos'] = $this->Admin_model->getModules($filtro);
        $this->plantilla();
        $this->load->view('modificarModulos', $data);
        $this->footer();
    }
    public function consultarModulo($moduloId = NULL)
    {

        $moduloId = $this->input->post('modulos');

        $data['modulo'] = $moduloId;
        $data['filtro'] = "consultar";

        $data = $this->Admin_model->getModule($data);

        if (!$data) {
            $view = 0;
            // var_dump($view); die();
        } else {
            //var_dump($data);
            $view = $this->load->view('updateModule', $data);
            $this->load->view('administracion/end');
        }

        return $view;
    }
    public function updateModulo()
    {
        $usuarioModificacion = $this->session->userdata('userId');
        $ipModificacion = $_SERVER['REMOTE_ADDR'];

        $datos = array(
            'moduleId'              => $this->input->post('moduleId'),
            'moduleName'            => $this->input->post('moduleName'),
            'moduleDescription'     => $this->input->post('moduleDescription'),
            'usuarioModificacion'   => $usuarioModificacion,
            'ipModificacion'        => $ipModificacion,

        );

        $r = $this->Admin_model->updateModule($datos);

        echo json_encode($r);
        return true;
    }
    public function nuevoUsuario()
    {

        $data['rols'] = $this->Admin_model->getRols();

        $this->plantilla();
        $this->load->view('nuevoUsuario', $data);
        $this->footer();
    }
    public function guardarUsuario()
    {
        $usuarioCreacion = $this->session->userdata('userId');
        $ipCreacion = $_SERVER['REMOTE_ADDR'];

        $datos = array(
            'userId'                  => $this->input->post('userId'),
            'userName'                => $this->input->post('userName'),
            'password'                => $this->input->post('password'),
            'mail'                    => $this->input->post('mail'),
            'rolId'                   => $this->input->post('rolId'),
            'usuarioCreacion'         => $usuarioCreacion,
            'ipCreacion'              => $ipCreacion,
            'activo'                  => "1",
        );

        $r = $this->Admin_model->saveUser($datos);
        echo json_encode($r);
        return true;
    }
    public function listRols()
    {
        $all = "todos";
        $data['rols'] = $this->Admin_model->getRols($all);

        $this->plantilla();
        $this->load->view('listRols', $data);
        $this->footer();
    }
    public function insertRol()
    {
        $usuarioCreacion = $this->session->userdata('userId');
        $ipCreacion = $_SERVER['REMOTE_ADDR'];
        $datos = array(
            'rolId'             => $this->input->post('rolId'),
            'rolName'           => $this->input->post('rolName'),
            'rolDescription'    => $this->input->post('rolDescription'),
            'usuarioCreacion'   => $usuarioCreacion,
            'ipCreacion'        => $ipCreacion,
            'activo'            => "1",
        );
        $r = $this->Admin_model->insertRol($datos);
        echo json_encode($r);
        return true;
    }
    public function actualizarRol($id = NULL)
    {
        $id = $this->uri->segment(3);
        if ($id === NULL) {
            redirect(base_url('Admin/listRols'));
            exit();
        }
        $data = $this->Admin_model->getRol($id);
        $this->plantilla();
        $this->load->view('updateRol', $data);
        $this->footer();
    }
    public function updateRol()
    {
        $usuarioModificacion = $this->session->userdata('userId');
        $ipModificacion = $_SERVER['REMOTE_ADDR'];
        $datos = array(
            'rolId'                 => $this->input->post('rolId'),
            'rolName'               => $this->input->post('rolName'),
            'rolDescription'        => $this->input->post('rolDescription'),
            'usuarioModificacion'   => $usuarioModificacion,
            'ipModificacion'        => $ipModificacion,
            'activo'                => $this->input->post('activo'),
        );
        $r = $this->Admin_model->updateRol($datos);

        echo json_encode($r);
        return true;
    }
    public function borrarRol($id = NULL)
    {
        $id = $this->input->post('rolId');

        $r = $this->Admin_model->deleteRol($id);
        echo json_encode($r);
        return true;
    }
    private function plantilla()
    {
        if (!$this->session->userdata('userId')) {
            redirect(base_url('Admin/Login'));
            exit();
        }

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
