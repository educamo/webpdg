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
		// Guarda el valor original de db_debug
		$db_debug = $this->db->db_debug;

		// Desactiva el modo de depuración
		$this->db->db_debug = FALSE;
		$respuesta = $this->db->insert('nu_clientes', $datos);
		// Verifica si hubo un error
		if (!$respuesta) {
			// Obtiene el arreglo con el código y el mensaje de error
			$error = $this->db->error();

			// Muestra un mensaje personalizado al usuario
			$respuesta = $error['code'];
		}

		// Restaura el valor original de db_debug
		$this->db->db_debug = $db_debug;

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
	public  function obtenerFacturas($idCliente = '')
	{
		$datos = array(
			'campos'    => 'id, fecha, idCliente, total, estado, activo',
			'tabla'     => 'facturas',
			'where'     => 'idCliente =' . $idCliente,
		);

		$facturas = $this->getData($datos);
		return $facturas;
	}
	public function obtenerFacturaCompleta($idFactura = '')
	{
		$this->db->select('
  facturas.id,
  facturas.fecha,
  facturas.total,
  detalles_facturas.serviceId,
  detalles_facturas.cantidad,
  detalles_facturas.precio_unitario,
  detalles_facturas.precio_total,
  nu_services.serviceTitle,
  nu_clientes.idCliente,
  nu_clientes.nombre
');
		$this->db->from('facturas');
		$this->db->join('detalles_facturas', 'detalles_facturas.factura_id = facturas.id', 'inner');
		$this->db->join('nu_services', 'detalles_facturas.serviceId = nu_services.serviceId', 'inner');
		$this->db->join('nu_clientes', 'facturas.idCliente = nu_clientes.idCliente', 'inner');
		$this->db->where('facturas.id', $idFactura);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function get_total_pagos($factura = '')
	{
		$this->db->select_sum('montoPago');
		$this->db->where('id_factura', $factura);
		$this->db->from('nu_pagos');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$row = $query->row();
			$total_pagos = $row->montoPago;
		} else {
			$total_pagos = NULL;
		}

		return $total_pagos;
	}
	public function registrarPago($datos = '')
	{
		$idFactura = $datos['id_factura'];
		$respuesta = $this->db->insert('nu_pagos', $datos);


		$object = array(
			'estado' => 2,
		);


		$this->db->where('id', $idFactura);
		$this->db->update('facturas', $object);

		return $respuesta;
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
