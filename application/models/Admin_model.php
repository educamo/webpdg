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
            $this->db->where('moduleId <> 1' );    
            $this->db->where('moduleId <> "slider"' ); 
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
            $this->db->where('moduleId <> 1' );     
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
    public function saveUser($datos = NULL)
    {
        
       return $this->db->insert('nu_users', $datos);
        
    }

    public function __destruct()
    {
        $this->db->close();
    }
}
