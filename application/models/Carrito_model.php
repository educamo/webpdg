<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Carrito_model extends CI_Model
{

    public function obtenerCarrito($idCliente = '')
    {
        $status = 1;

        $this->db->join('carrito_productos', 'carritos.id = carrito_productos.carrito_id', 'left');
        $this->db->join('nu_services', 'nu_services.serviceId = carrito_productos.serviceId', 'left');

        $this->db->where('idCliente', $idCliente);
        $this->db->where('status', $status);
        $query = $this->db->get('carritos');
        $resultados = $query->result();

        return $resultados;
    }
    public function obtenerCarrito_byId($carritoId = '')
    {
        $id = $carritoId;
        $this->db->join('carrito_productos', 'carritos.id = carrito_productos.carrito_id', 'left');
        $this->db->join('nu_services', 'nu_services.serviceId = carrito_productos.serviceId', 'left');
        $this->db->where('carritos.id', $id);
        $query = $this->db->get('carritos');
        return $query->result_array();
    }
    public function addOrden($carrito = '')
    {
        $carrito = json_decode($carrito);
        $carritoId = $carrito[0]->carrito_id;
        $idCliente = $carrito[0]->idCliente;
        $fecha = date("Y-m-d H:i:s");
        $suma = 0;
        $valores = array();

        foreach ($carrito as $valor) {
            $suma += $valor->precio_total;
        }

        $datos = array(
            'idCliente' => $idCliente,
            'fecha'     => $fecha,
            'total'     => $suma,
            'estado'    => 1,
        );

        $insert = $this->db->insert('ordenesservicios', $datos);
        $idOrden = $this->db->insert_id();

        foreach ($carrito as $valor) {

            $valores[] = array(
                'serviceId'         => $valor->serviceId,
                'cantidad'          => $valor->cantidad,
                'precioUnitario'    => $valor->servicePrice,
                'precioTotal'       => $valor->precio_total,
                'idOrden'           => $idOrden,
            );
        }

        $insertDetalle = $this->db->insert_batch('ordendetalles', $valores);

        if ($insert == true && $insertDetalle == true) {
            $object = array(
                'status' => 0,
            );
            $this->db->where('id', $carritoId);
            $this->db->update('carritos', $object);

            return true;
        } else {
            return false;
        }
    }
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
    public function updateProducto($datos = '')
    {
        $id = $datos['id'];
        $valores = array(
            'cantidad'      => $datos['cantidad'],
            'precio_total'  => $datos['precio_total'],
        );
        $this->db->where('id', $id);
        return $this->db->update('carrito_productos', $valores);
    }
    public function deleteProducto($id = '')
    {
        $this->db->where('id', $id);
        return $this->db->delete('carrito_productos');
    }
}
