<?php

class Cliente_model extends CI_Model {

    public function get_usuario_by_email($datos = '') {
        $email = $datos['email'];
        $password = $datos['password'];
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('nu_clientes');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
}

