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

    public function __destruct()
    {
        $this->db->close();
    }
}
