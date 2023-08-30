<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Carrito_model extends CI_Model
{

    public function verificarCarrito($cliente = '')
    {
        $idCliente = $cliente;
        $status = 1;
        $this->db->where('idCliente', $idCliente);
        $this->db->where('status', $status);
        $query = $this->db->get('carritos');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {

            return true;
        }
    }
    public function newCarrito($cliente = '')
    {
        $idCliente = $cliente;
        $this->db->insert('carritos', [
            'idCliente' => $idCliente,
        ]);
        return true;
    }
    public function addProducto($datos = '')
    {
       return $this->db->insert('carrito_productos', $datos);
    }
}
