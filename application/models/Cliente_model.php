<?php

class Cliente_model extends CI_Model
{

    public function get_usuario_by_email($datos = '')
    {
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

    public function registrarCliente($datos = '')
    {
        $respuesta = $this->db->insert('nu_clientes', $datos);
        return $respuesta;
    }
    public function getLogo($value = '')
    {
        $logo = $this->getConfig($value);
        return $logo;
    }

    public function getAuthor($value = '')
    {
        $author = $this->getConfig($value);
        return $author;
    }
    public function getCompany($value = '')
    {
        $company = $this->getConfig($value);
        return $company;
    }
    public function getRedes()
    {
        $datos = array(
            'campos' => 'socialName, socialIcon, socialUrl',
            'tabla'  => 'nu_social',
        );

        $social = $this->getData($datos);
        return $social;
    }
    public function obtenerCliente($idCliente = '')
    {
        $datos = array(
            'campos'    => 'email, idCliente, nombre',
            'tabla'     => 'nu_Clientes',
            'where'     => 'idCliente =' . $idCliente,
        );

        $cliente = $this->getData($datos);
        return $cliente;
    }
    public function ActualizarCliente($datos = '')
    {
        $this->db->where('idCliente', $datos["idCliente"]);
        return $this->db->update('nu_clientes', $datos);
    }
    public function ActualizarPassword($datos = '')
    {
        $this->db->where('idCliente', $datos["idCliente"]);
        return $this->db->update('nu_clientes', $datos);
    }
    private function getConfig($value = '')
    {
        $this->db->select('configName, configValue');
        $this->db->from('nu_config');
        $this->db->where('configName', $value);
        $this->db->where('activo', 1);

        $query = $this->db->get();


        $num_filas = $query->num_rows();

        if (!($num_filas) || ($num_filas = 0)) {
            $data = '';
        } else {
            $data  = $query->row();
        }

        return $data;
    }
    private function getData($value = '')
    {
        if (isset($value['where'])) {
            $this->db->where($value['where']);
        }

        $this->db->select($value['campos']);
        $this->db->from($value['tabla']);
        $this->db->where('activo', 1);

        $query = $this->db->get();
        $data  = $query->result_array();

        return $data;
    }

    public function __destruct()
    {
        $this->db->close();
    }
}
