<?Php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function dasboard()
    {
        $value = 1;
        $this->db->select('moduleId, moduleName');
        $this->db->from('nu_modules');
        $this->db->where('activo', $value);
        $cantModules = $this->db->count_all_results();


        $admin = $this->session->rolId;
        if ($admin == 1) {
            $this->db->select('userId');
            $this->db->from('nu_users');
            $cantUsers = $this->db->count_all_results();
        } else {
            $cantUsers = 0;
        };

        $datos = array(
            'usuarios' => $cantUsers,
            'clientes' => $cantModules,
        );

        return $datos;
    }
    public function loginUser()
    {
        $mail = $this->input->post('user');
        $password = $this->input->post('password');


        $this->db->select('userId, userName, mail, rolId');
        $this->db->from('nu_users');
        $this->db->where('mail', $mail);
        $this->db->where('password', $password);
        $query = $this->db->get();
        return $query->result();
    }
    public function getSlider($id = NULL)
    {
        $this->db->select('sliderId, sliderImagen, sliderTitle, sliderText, activo');
        $this->db->from('nu_slider');
        if ($id !== NULL) {
            $this->db->where('sliderId', $id);
            $query = $this->db->get();
            $data = $query->row();
        } else {
            $query = $this->db->get();
            $data = $query->result();
        }
        return $data;
    }
    public function saveSlider($datos = NULL)
    {
        return $this->db->insert('nu_slider', $datos);
    }
    public function deleteSlider($id = NULL)
    {
        $value = $id;
        $this->db->where('sliderId', $value);

        return $this->db->delete('nu_slider');
    }
    public function updateSlider($datos = NULL)
    {
        $id = $datos['sliderId'];
        $this->db->where('sliderId', $id);
        return $this->db->update('nu_slider', $datos);
    }
    public function getProyectos($id = NULL)
    {
        $this->db->select('projectId, projectImagen, projectTitle, projectDescription, activo');
        $this->db->from('nu_projects');
        if ($id !== NULL) {
            $this->db->where('projectId', $id);
            $query = $this->db->get();
            $data = $query->row();
        } else {

            $query = $this->db->get();
            $data = $query->result();
        }
        return $data;
    }
    public function saveProject($datos = NULL)
    {
        return $this->db->insert('nu_projects', $datos);
    }
    public function deleteProject($id = NULL)
    {
        $value = $id;
        $this->db->where('projectId', $value);
        return $this->db->delete('nu_projects');
    }
    public function updateProject($datos = NULL)
    {
        $value = $datos['id'];
        $datos = array(
            'projectId'             => $datos['projectId'],
            'projectImagen'         => $datos['projectImagen'],
            'projectTitle'          => $datos['projectTitle'],
            'projectDescription'    => $datos['projectDescription'],
            'moduleId'              => $datos['moduleId'],
            'usuarioModificacion'   => $datos['usuarioModificacion'],
            'ipModificacion'        => $datos['ipModificacion'],
            'activo'                => $datos['activo'],
        );
        $this->db->where('projectId', $value);
       return $this->db->update('nu_projects', $datos);
    }
    public function getConfig($id = NULL)
    {
        $this->db->select('configId, configValue, configDescription');
        $this->db->from('nu_config');
        if ($id !== NULL) {
            $this->db->where('configId', $id);
            $query = $this->db->get();
            $data = $query->row();
        } else {
            $this->db->where('configId <> "Logo"');
            $this->db->where('configId <> "mailEmp"');
            $query = $this->db->get();
            $data = $query->result();
        }
        return $data;
    }
    public function updateConfig($datos = NULL)
    {
        $id = $datos["configId"];
        $this->db->where('configId', $id);

        return $this->db->update('nu_config', $datos);
    }
    public function insertConfig($datos = NULL)
    {
        return $this->db->insert('nu_config', $datos);
    }
    public function updateLogo($datos = NULL)
    {
        $id = $datos['configId'];
        $this->db->where('configId', $id);
        return $this->db->update('nu_config', $datos);
    }
    public function getSocial()
    {
        $this->db->select('*');
        $this->db->from('nu_social');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
    public function getModules($filtro = null)
    {
        $this->db->select('moduleId, moduleName, moduleDescription, activo');

        $this->db->from('nu_modules');
        if ($filtro === "modificar") {
            $this->db->where('moduleId <> 1');
            $this->db->where('moduleId <> "slider"');
        }

        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
    public function getModule($data = null)
    {
        $moduloId = $data['modulo'];
        $filtro = $data['filtro'];
        $value = 1;
        $this->db->select('moduleId, moduleName, moduleDescription, activo');

        $this->db->from('nu_modules');
        if ($filtro === "consultar") {
            $this->db->where('moduleId', $moduloId);
            $this->db->where('moduleId <> 1');
            $this->db->where('activo', $value);
        }

        $query = $this->db->get();
        $data = $query->row();
        return $data;
    }
    public function updateModule($datos = null)
    {
        $value = $datos["moduleId"];
        $this->db->where('moduleId', $value);

        return $this->db->update('nu_modules', $datos);
    }
    public function getRols($filtro = NULL)
    {
        $this->db->select('rolId, rolName, activo');
        $this->db->from('nu_rols');
        if ($filtro !== "todos") {
            $this->db->where('activo', "1");
        }


        $query = $this->db->get();
        $data = $query->result();

        return $data;
    }
    public function getRol($id = NULL)
    {

        $this->db->select('rolId, rolName, rolDescription, activo');
        $this->db->from('nu_rols');
        $this->db->where('rolId', $id);
        $query = $this->db->get();
        $data = $query->row();

        return $data;
    }
    public function insertRol($datos = NULL)
    {
        return $this->db->insert('nu_rols', $datos);
    }
    public function updateRol($datos = NULL)
    {
        $value = $datos["rolId"];
        $this->db->where('rolId', $value);

        return $this->db->update('nu_rols', $datos);
    }
    public function deleteRol($id = NULL)
    {
        $value = $id;
        $this->db->where('rolId', $value);

        return $this->db->delete('nu_rols');
    }
    public function getUsers()
    {
        $this->db->select('nu_users.userId, nu_users.userName, nu_users.mail, nu_users.activo, nu_rols.rolId, nu_rols.rolName');
        $this->db->from('nu_users');
        $this->db->join('nu_rols', 'nu_users.rolId = nu_rols.rolId', 'inner');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
    public function getUser($id = NULL)
    {
        $this->db->select('userId, userName, mail, rolId, activo');
        $this->db->from('nu_users');
        $this->db->where('userId', $id);
        $query = $this->db->get();
        $data = $query->row();
        return $data;
    }
    public function updateUser($datos = NULL)
    {
        $value = $datos["userId"];
        $this->db->where('userId', $value);

        return $this->db->update('nu_users', $datos);
    }
    public function deleteUser($id = NULL)
    {
        $value = $id;
        $this->db->where('userId', $value);
        return $this->db->delete('nu_users');
    }
    public function saveUser($datos = NULL)
    {
        return $this->db->insert('nu_users', $datos);
    }

    public function __destruct()
    {
        $this->db->close();
    }
}
