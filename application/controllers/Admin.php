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

    //  ----------------- SLIDERS -------------------------
    public function slider()
    {
        $data['sliders'] = $this->Admin_model->getSlider();
        $this->plantilla();
        $this->load->view('slider', $data);
        $this->footer();
    }
    public function nuevoSlider()
    {
        $this->plantilla();
        $this->load->view('nuevoSlider');
        $this->footer();
    }
    /**
     * Function: guardarSlider()
     * Description: función encargada de validar y subir la imagen del slider
     * a demas de guardar los datos en la BD
     * @author César Carrasco <educamo@hotmail.com>
     *
     * @return void echo (json)
     * @date: 09/11/2022
     */
    public function guardarSlider()
    {
        // obtenemos el usuario y la ip de modificación
        $usuarioCreacion = $this->session->userdata('userId');
        $ipCreacion = $_SERVER['REMOTE_ADDR'];

        // se asigna la ruta del directorio en el server donde sa subirá la image
        $root = $_SERVER['DOCUMENT_ROOT'];
        $target_dir =  $root . '/webpdg/assets/img/';
        // se crea la ruta completa del archivo a subir
        $target_file = $target_dir . basename($_FILES["sliderImagen"]["name"]);

        // se obtiene la extension del archivo a subir en minúscula
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check si la el archivo a subir es una imagen permitida y si ees de las dimensiones permitidas
        $check = getimagesize($_FILES["sliderImagen"]["tmp_name"]);
        if ($check !== false) {
            $width_file = $check[0];
            $height_file = $check[1];
        } else {
            echo  json_encode(lang('noImagen'));
            return false;
            exit();
        }

        // Check if file already exists
        if (file_exists($target_file)) {

            echo json_encode(lang('exists'));
            return false;
            exit();
        }

        // Check file size menor a 1Mb
        if ($_FILES["sliderImagen"]["size"] > 1130304) {
            echo json_encode(lang('size'));
            return false;
            exit();
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "jpeg") {
            echo json_encode(lang('onlyJpeg'));
            return false;
            exit();
        }
        //se verifican las dimensiones de la imagen
        if ($width_file !== 1400 && $height_file !== 750) {
            echo json_encode(lang('noDimension'));
            return false;
            exit();
        }

        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["sliderImagen"]["tmp_name"], $target_file)) {

            $sliderTitle = $_POST["sliderTitle"];
            $sliderText = $_POST["sliderText"];
            $sliderImagen = $_FILES["sliderImagen"]["name"];
            $datos = array(
                'sliderImagen'      => $sliderImagen,
                'sliderTitle'       => $sliderTitle,
                'sliderText'        => $sliderText,
                'moduleId'          => "slider",
                'usuarioCreacion'   => $usuarioCreacion,
                'ipCreacion'        => $ipCreacion,
                'activo'            => "1",
            );
            $r = $this->Admin_model->saveSlider($datos);
            echo json_encode($r);
            return true;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
    public function borrarSlider($id = NULL)
    {
        $id = $this->input->post('sliderId');
        $slider = $this->Admin_model->getSlider($id);

        //borramos el archivo del servidor
        // se asigna la ruta del directorio en el server donde sa subirá la image
        $root = $_SERVER['DOCUMENT_ROOT'];
        $target_dir =  $root . '/webpdg/assets/img/';
        $imagen = $target_dir . $slider->sliderImagen;
        // var_dump($imagen); die();
        unlink($imagen);

        $r = $this->Admin_model->deleteSlider($id);
        echo json_encode($r);
        return true;
    }
    public function actualizarSlider($id = NULL)
    {
        $id = $this->uri->segment(3);
        // var_dump($id);
        if ($id === NULL) {
            redirect(base_url('Admin/slider'));
            exit();
        }
        $data = $this->Admin_model->getSlider($id);

        $this->plantilla();
        $this->load->view('updateSlider', $data);
        $this->footer();
    }
    public function modificarSlider()
    {
        // obtenemos el usuario y la ip de modificación
        $usuarioModificacion = $this->session->userdata('userId');
        $ipModificacion = $_SERVER['REMOTE_ADDR'];

        // se asigna la ruta del directorio en el server donde sa subirá la image
        $root = $_SERVER['DOCUMENT_ROOT'];
        $target_dir =  $root . '/webpdg/assets/img/';
        // se crea la ruta completa del archivo a subir
        $target_file = $target_dir . basename($_FILES["sliderImagen"]["name"]);

        // se obtiene la extension del archivo a subir en minúscula
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check si la el archivo a subir es una imagen permitida y si ees de las dimensiones permitidas
        $check = getimagesize($_FILES["sliderImagen"]["tmp_name"]);
        if ($check !== false) {
            $width_file = $check[0];
            $height_file = $check[1];
        } else {
            echo  json_encode(lang('noImagen'));
            return false;
            exit();
        }

        // se borrar la imagen antigua del servidor antes de subir la nueva
        $imagenVieja = $_POST["imagenVieja"];
        $imagen = $target_dir . $imagenVieja;
        unlink($imagen);

        // Check if file already exists
        if (file_exists($target_file)) {

            echo json_encode(lang('exists'));
            return false;
            exit();
        }

        // Check file size menor a 1Mb
        if ($_FILES["sliderImagen"]["size"] > 1130304) {
            echo json_encode(lang('size'));
            return false;
            exit();
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "jpeg") {
            echo json_encode(lang('onlyJpeg'));
            return false;
            exit();
        }
        //se verifican las dimensiones de la imagen
        if ($width_file !== 1400 && $height_file !== 750) {
            echo json_encode(lang('noDimension'));
            return false;
            exit();
        }

        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["sliderImagen"]["tmp_name"], $target_file)) {

            $sliderTitle    = $_POST["sliderTitle"];
            $sliderText     = $_POST["sliderText"];
            $sliderId       = $_POST["sliderId"];
            $activo         = $this->input->post('activo');

            $sliderImagen = $_FILES["sliderImagen"]["name"];

            $datos = array(
                'sliderId'              => $sliderId,
                'sliderImagen'          => $sliderImagen,
                'sliderTitle'           => $sliderTitle,
                'sliderText'            => $sliderText,
                'moduleId'              => "slider",
                'usuarioModificacion'   => $usuarioModificacion,
                'ipModificacion'        => $ipModificacion,
                'activo'                => $activo,
            );
            $r = $this->Admin_model->updateSlider($datos);
            echo json_encode($r);
            return true;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
    //------------------- PROYECTOS ------------------
    public function proyectos()
    {
        $data['projects'] = $this->Admin_model->getProyectos();
        $this->plantilla();
        $this->load->view('proyectos', $data);
        $this->footer();
    }
    public function nuevoproject()
    {
        $this->plantilla();
        $this->load->view('nuevopPoject');
        $this->footer();
    }
    public function guardarproject()
    {
        // obtenemos el usuario y la ip de modificación
        $usuarioCreacion = $this->session->userdata('userId');
        $ipCreacion = $_SERVER['REMOTE_ADDR'];

        // se asigna la ruta del directorio en el server donde sa subirá la image
        $root = $_SERVER['DOCUMENT_ROOT'];
        $target_dir =  $root . '/webpdg/assets/img/';
        // se crea la ruta completa del archivo a subir
        $target_file = $target_dir . basename($_FILES["projectImagen"]["name"]);

        // se obtiene la extension del archivo a subir en minúscula
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check si la el archivo a subir es una imagen permitida y si ees de las dimensiones permitidas
        $check = getimagesize($_FILES["projectImagen"]["tmp_name"]);
        if ($check !== false) {
            $width_file = $check[0];
            $height_file = $check[1];
        } else {
            echo  json_encode(lang('noImagen-project'));
            return false;
            exit();
        }

        // Check if file already exists
        if (file_exists($target_file)) {

            echo json_encode(lang('exists-project'));
            return false;
            exit();
        }

        // Check file size menor a 1Mb
        if ($_FILES["projectImagen"]["size"] > 1130304) {
            echo json_encode(lang('size-project'));
            return false;
            exit();
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            echo json_encode(lang('onlyJpeg-png-project'));
            return false;
            exit();
        }
        //se verifican las dimensiones de la imagen
        if ($width_file !== 306 && $height_file !== 360) {
            echo json_encode(lang('noDimension-project'));
            return false;
            exit();
        }

        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["projectImagen"]["tmp_name"], $target_file)) {

            $projectId          = $this->input->post('projectId');
            $projectTitle       = $_POST["projectTitle"];
            $projectDescription = $_POST["projectDescription"];
            $projectImagen      = $_FILES["projectImagen"]["name"];

            $datos = array(
                'projectId'             => $projectId,
                'projectImagen'         => $projectImagen,
                'projectTitle'          => $projectTitle,
                'projectDescription'    => $projectDescription,
                'moduleId'              => "featured",
                'usuarioCreacion'       => $usuarioCreacion,
                'ipCreacion'            => $ipCreacion,
                'activo'                => "1",
            );
            $r = $this->Admin_model->saveProject($datos);
            echo json_encode($r);
            return true;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
    public function borrarproject($id = NULL)
    {
        $id = $this->input->post('projectId');
        $project = $this->Admin_model->getProyectos($id);

        //borramos el archivo del servidor
        // se asigna la ruta del directorio en el server donde sa subirá la image
        $root = $_SERVER['DOCUMENT_ROOT'];
        $target_dir =  $root . '/webpdg/assets/img/';
        $imagen = $target_dir . $project->projectImagen;
        // var_dump($imagen); die();
        unlink($imagen);

        $r = $this->Admin_model->deleteProject($id);
        echo json_encode($r);
        return true;
    }
    public function actualizarproject($id = NULL)
    {
        $id = $this->uri->segment(3);
        // var_dump($id);
        if ($id === NULL) {
            redirect(base_url('Admin/proyectos'));
            exit();
        }
        $data = $this->Admin_model->getProyectos($id);

        $this->plantilla();
        $this->load->view('updateProjects', $data);
        $this->footer();
    }
    public function modificarPoject()
    {
        // obtenemos el usuario y la ip de modificación
        $usuarioModificacion = $this->session->userdata('userId');
        $ipModificacion = $_SERVER['REMOTE_ADDR'];

        // se asigna la ruta del directorio en el server donde sa subirá la image
        $root = $_SERVER['DOCUMENT_ROOT'];
        $target_dir =  $root . '/webpdg/assets/img/';
        // se crea la ruta completa del archivo a subir
        $target_file = $target_dir . basename($_FILES["projectImagen"]["name"]);

        // se obtiene la extension del archivo a subir en minúscula
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check si la el archivo a subir es una imagen permitida y si ees de las dimensiones permitidas
        $check = getimagesize($_FILES["projectImagen"]["tmp_name"]);
        if ($check !== false) {
            $width_file = $check[0];
            $height_file = $check[1];
        } else {
            echo  json_encode(lang('noImagen-project'));
            return false;
            exit();
        }

        // se borrar la imagen antigua del servidor antes de subir la nueva
        $imagenVieja = $_POST["imagenVieja"];
        $imagen = $target_dir . $imagenVieja;
        unlink($imagen);

        // Check if file already exists
        if (file_exists($target_file)) {

            echo json_encode(lang('exists-project'));
            return false;
            exit();
        }

        // Check file size menor a 1Mb
        if ($_FILES["projectImagen"]["size"] > 1130304) {
            echo json_encode(lang('size-project'));
            return false;
            exit();
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            echo json_encode(lang('onlyJpeg-png-project'));
            return false;
            exit();
        }
        //se verifican las dimensiones de la imagen
        if ($width_file !== 306 && $height_file !== 360) {
            echo json_encode(lang('noDimension-project'));
            return false;
            exit();
        }

        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["projectImagen"]["tmp_name"], $target_file)) {

            $projectTitle           = $_POST["projectTitle"];
            $projectDescription     = $_POST["projectDescription"];
            $projectId              = $_POST["projectId"];
            $activo                 = $this->input->post('activo');
            $id                     = $this->input->post('Id');

            $projectImagen = $_FILES["projectImagen"]["name"];

            $datos = array(
                'projectId'             => $projectId,
                'projectImagen'         => $projectImagen,
                'projectTitle'          => $projectTitle,
                'projectDescription'    => $projectDescription,
                'moduleId'              => "featured",
                'usuarioModificacion'   => $usuarioModificacion,
                'ipModificacion'        => $ipModificacion,
                'activo'                => $activo,
                'id'                    => $id,
            );
            $r = $this->Admin_model->updateProject($datos);
            echo json_encode($r);
            return true;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }

    // ---------------- CONFIG CONTACTO  ----------------------
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

    //  -------------- CONFIG LOGO --------------------------
    public function configLogo()
    {
        $configId = 'Logo';
        $data['config'] = $this->Admin_model->getConfig($configId);
        $this->plantilla();
        $this->load->view('configLogo', $data);
        $this->footer();
    }
    public function modificarLogo()
    {
        // obtenemos el usuario y la ip de modificación
        $usuarioModificacion = $this->session->userdata('userId');
        $ipModificacion = $_SERVER['REMOTE_ADDR'];

        // se asigna la ruta del directorio en el server donde sa subirá la image
        $root = $_SERVER['DOCUMENT_ROOT'];
        $target_dir =  $root . '/webpdg/assets/img/';
        // se crea la ruta completa del archivo a subir
        $target_file = $target_dir . basename($_FILES["configValue"]["name"]);

        // se obtiene la extension del archivo a subir en minúscula
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check si la el archivo a subir es una imagen permitida y si ees de las dimensiones permitidas
        $check = getimagesize($_FILES["configValue"]["tmp_name"]);
        if ($check !== false) {
            $width_file = $check[0];
            $height_file = $check[1];
        } else {
            echo  json_encode(lang('noImagen-logo'));
            return false;
            exit();
        }

        // se borrar la imagen antigua del servidor antes de subir la nueva
        $imagenVieja = $_POST["imagenVieja"];
        $imagen = $target_dir . $imagenVieja;
        unlink($imagen);

        // Check if file already exists
        if (file_exists($target_file)) {

            echo json_encode(lang('exists-logo'));
            return false;
            exit();
        }

        // Check file size menor a 1Mb
        if ($_FILES["configValue"]["size"] > 1130304) {
            echo json_encode(lang('size-logo'));
            return false;
            exit();
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            echo json_encode(lang('onlyJpeg-png'));
            return false;
            exit();
        }
        //se verifican las dimensiones de la imagen
        if ($width_file !== 259 && $height_file !== 91) {
            echo json_encode(lang('noDimension-logo'));
            return false;
            exit();
        }

        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["configValue"]["tmp_name"], $target_file)) {

            $configId       = $_POST["configId"];
            $activo         = "1";
            $configValue    = $_FILES["configValue"]["name"];

            $datos = array(
                'configId'              => $configId,
                'configValue'           => $configValue,
                'usuarioModificacion'   => $usuarioModificacion,
                'ipModificacion'        => $ipModificacion,
                'activo'                => $activo,
            );
            $r = $this->Admin_model->updateLogo($datos);
            echo json_encode($r);
            return true;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }

    //  --------------- REDES SOCIALES ----------------
    public function listSocial()
    {
        $data['redes'] = $this->Admin_model->getSocial();
        $this->plantilla();
        $this->load->view('listSocial', $data);
        $this->footer();
    }

    //  -------------------- MODULOS -----------------
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
    public function verModulo()
    {
        $usuarioModificacion = $this->session->userdata('userId');
        $ipModificacion = $_SERVER['REMOTE_ADDR'];

        $activo = $this->input->post('activo');
        if ($activo === "1") {
            $activo = 0;
        } else {
            $activo = 1;
        }

        $datos = array(
            'moduleId'              => $this->input->post('moduleId'),
            'activo'                => $activo,
            'usuarioModificacion'   => $usuarioModificacion,
            'ipModificacion'        => $ipModificacion,

        );

        $r = $this->Admin_model->updateModule($datos);

        echo json_encode($r);
        return true;
    }

    //  ---------------- USUARIOS ------------------------------
    public function listUsuarios()
    {
        $data['users'] = $this->Admin_model->getUsers();

        $data['session'] = $this->session->userdata('userId');

        $this->plantilla();
        $this->load->view('listUsuarios', $data);
        $this->footer();
    }
    public function actualizaruser($id = NULL)
    {
        $id = $this->uri->segment(3);
        if ($id === NULL) {
            redirect(base_url('Admin/listUsuarios'));
            exit();
        }
        $data = $this->Admin_model->getUser($id);
        $rol = $this->Admin_model->getRols();

        $data->rols = $rol;
        $this->plantilla();
        $this->load->view('actualizarUser', $data);
        $this->footer();
    }
    public function actualizarUsuario()
    {
        $usuarioModificacion = $this->session->userdata('userId');
        $ipModificacion = $_SERVER['REMOTE_ADDR'];
        $datos = array(
            'userId'                => $this->input->post('userId'),
            'userName'              => $this->input->post('userName'),
            'mail'                  => $this->input->post('mail'),
            'rolId'                 => $this->input->post('rolId'),
            'usuarioModificacion'   => $usuarioModificacion,
            'ipModificacion'        => $ipModificacion,
            'activo'                => $this->input->post('activo'),
        );
        $r = $this->Admin_model->updateUser($datos);

        echo json_encode($r);
        return true;
    }
    public function borrarUsuario($id = NULL)
    {
        $id = $this->input->post('userId');

        $r = $this->Admin_model->deleteUser($id);
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

    //  ----------------- CONFIGURACIONES -----------------
    public function listconfig()
    {
        $data['configs'] = $this->Admin_model->getConfig();

        $this->plantilla();
        $this->load->view('listconfig', $data);
        $this->footer();
    }
    public function actualizarConfig($id = NULL)
    {
        $id = $this->uri->segment(3);
        if ($id === NULL) {
            redirect(base_url('Admin/listconfig'));
            exit();
        }
        $data = $this->Admin_model->getConfig($id);
        $this->plantilla();
        $this->load->view('actualizarConfig', $data);
        $this->footer();
    }
    public function insertConfig()
    {
        $usuarioCreacion = $this->session->userdata('userId');
        $ipCreacion = $_SERVER['REMOTE_ADDR'];
        $datos = array(
            'configId'          => $this->input->post('configId'),
            'configValue'       => $this->input->post('configValue'),
            'configDescription' => $this->input->post('configDescription'),
            'usuarioCreacion'   => $usuarioCreacion,
            'ipCreacion'        => $ipCreacion,
            'activo'            => "1",
        );
        $r = $this->Admin_model->insertConfig($datos);
        echo json_encode($r);
        return true;
    }
    public function updateConfig()
    {
        $usuarioModificacion = $this->session->userdata('userId');
        $ipModificacion = $_SERVER['REMOTE_ADDR'];
        $datos = array(
            'configId'              => $this->input->post('configId'),
            'configValue'          => $this->input->post('configValue'),
            'configDescription'     => $this->input->post('configDescription'),
            'usuarioModificacion'   => $usuarioModificacion,
            'ipModificacion'        => $ipModificacion,
            'activo'                => $this->input->post('activo'),
        );
        $r = $this->Admin_model->updateConfig($datos);

        echo json_encode($r);
        return true;
    }

    //  --------------- ROLES ------------------
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
