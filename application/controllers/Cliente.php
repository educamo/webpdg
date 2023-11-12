<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cliente extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cliente_model');

		//Carga la librería de form_validation
		$this->load->library(array('form_validation'));

		$this->lang->load("Clientes");
	}

	public function login()
	{
		if (isset($_POST['email']) && isset($_POST['password'])) {
			$login = $this->Cliente_model->get_usuario_by_email($_POST);

			if ($login) {
				$arrayUser = array(
					'idCliente'        => $login->idCliente,
					'nombre'           => $login->nombre,
					'email'            => $login->email,
				);
				$this->session->set_userdata($arrayUser);
			} else {
				header("HTTP/1.1 400 Bad Request");
				return FALSE;
			}
		}
	}

	public function perfil($cliente = '')
	{


		$cliente = $this->url->segment(3);

		$sessionCliente = $this->session->userdata('idCliente');

		if ($sessionCliente == '' || $sessionCliente != $cliente) {

			redirect(base_url());
			return false;
			die();
		};

		$idCliente       = $cliente;
		$view = "shop/configCliente";

		$datosCliente = $this->obtenerCliente($idCliente);

		$datos = array(
			'idCliente'     => $datosCliente[0]['idCliente'],
			'email'         => $datosCliente[0]['email'],
			'nombre'        => $datosCliente[0]['nombre'],
		);


		$this->plantillaCliente($datos, $view);
	}

	public function facturas($cliente = '')
	{
		$cliente = $this->url->segment(3);

		$sessionCliente = $this->session->userdata('idCliente');

		if ($sessionCliente == '' || $sessionCliente != $cliente) {

			redirect(base_url());
			return false;
			die();
		};

		$idCliente       = $cliente;
		$view = "shop/facturas";

		$facturas = $this->obtenerFacturas($idCliente);


		$datos["facturas"] = $facturas;
		$datos["idCliente"] = $idCliente;

		$this->plantillaCliente($datos, $view);
	}
	public function factura($factura = '')
	{
		$factura = $this->url->segment(3);

		$facturaPdf = $this->Cliente_model->obtenerFacturaCompleta($factura);
		$logo            = $this->obtenerLogo();

		$datos['factura'] = $facturaPdf;
		$datos['logo'] = $logo->configValue;

		$this->load->view('shop/facturaPdf', $datos);
	}

	public function registrarPago()
	{
		$factura = $this->input->post('id_factura');
		$fecha = $this->input->post('fecha');
		$monto = $this->input->post('monto');
		$tipoPago = $this->input->post('tipo_pago');
		$referencia = $this->input->post('referencia');

		$totalFactura = $this->input->post('totalFactura');

		$totalPagos = $this->obtenerTotalPagos($factura);

		if ($totalPagos == NULL) {
			$totalPagos = 0;
		}

		$deuda = $totalFactura - $totalPagos;

		if ($deuda > 0 && $deuda >= $monto) {

			$datos = array(
				'id_factura'        => $factura,
				'fechaPago'         => $fecha,
				'montoPago'         => $monto,
				'idTipoPago'        => $tipoPago,
				'referenciaPago'    => $referencia,
			);

			$respuesta = $this->Cliente_model->registrarPago($datos);



			if ($respuesta === true) {
				$respuesta = "El pago se registro correctamente";
			}
			echo $respuesta;
			return true;
		} else {
			$respuesta = "No puede reportar un pago superior a la deuda de la factura";
			echo $respuesta;
			header("HTTP/1.1 400 Bad Request");
			return FALSE;
		}
	}

	public function register()
	{
		$nombre = $this->input->post('cliente[nombre]');
		$dni = $this->input->post('cliente[dni]');
		$email = $this->input->post('cliente[email]');
		$passwd = $this->input->post('cliente[password]');

		$datos = array(
			'email'         => $email,
			'idCliente'     => $dni,
			'nombre'        => $nombre,
			'password'      => $passwd,
		);

		$data = $this->Cliente_model->registrarCliente($datos);


		if ($data === 1062) {
			$data = 'false';
		}

		echo $data;
		return true;
	}

	public function nuevo()
	{
		$this->load->view('shop/registrarCliente');
	}
	public function logout()
	{
		$this->session->unset_userdata('idCLiente');
		session_destroy();
		redirect(base_url());
	}
	public function updateDatos($nombreCliente = '', $idCliente = '', $emailCliente = '')
	{
		$nombreCliente = $this->input->post('nombre');
		$idCliente = $this->input->post('idCliente');
		$emailCliente = $this->input->post('email');

		$datos = array(
			'email'     => $emailCliente,
			'idCliente' => $idCliente,
			'nombre'    => $nombreCliente,
			'activo'    => 1,
		);

		$respuesta = $this->Cliente_model->ActualizarCliente($datos);

		if ($respuesta == true) {
			$msg = lang('msgUpdateCliente');
			echo $msg;
			return $msg;
		} else {
			$msg = lang('msgUpdateCliente-error');
			echo $msg;
			return $msg;
		}
	}

	public function updatePassword($password = '', $idCliente = '')
	{
		$password = $this->input->post('password');
		$idCliente = $this->input->post('idCliente');

		$datos = array(
			'password'  => $password,
			'idCliente' => $idCliente,
			'activo'    => 1,
		);

		$respuesta = $this->Cliente_model->ActualizarPassword($datos);

		if ($respuesta == true) {
			$msg = lang('msgUpdatePassword');
			echo $msg;
			return $msg;
		} else {
			$msg = lang('msgUpdatePassword-error');
			echo $msg;
			return $msg;
		}
	}

	private function plantillaCliente($datos = '', $view = '')
	{
		$cliente = $datos;

		$logo            = $this->obtenerLogo();
		$title           = lang('titlePage');
		$author          = $this->obtenerAuthor();
		$company         = $this->obtenerCompany();
		$social          = $this->obtenerRedes();


		$data['title']              = $title;
		$data['company']            = $company;
		$data['cliente']            = $cliente;

		$foot['author']             = $author;
		$foot['company']            = $company;
		$foot['social']             = $social;

		$log['logo']                = $logo;
		$log['idCliente']           = $cliente['idCliente'];

		$this->load->view('shop/configCliente/headCliente', $data);
		$this->load->view('shop/configCliente/menuCliente', $log);
		$this->load->view($view, $datos);
		$this->load->view('shop/configCliente/footerCliente', $foot);
	}
	private function obtenerLogo()
	{
		$value = 'Logo';
		$log = $this->Cliente_model->getLogo($value);
		return $log;
	}
	private function obtenerAuthor()
	{
		$value = 'Design';
		$author = $this->Cliente_model->getAuthor($value);
		return $author;
	}
	private function obtenerCompany()
	{
		$value = 'nombreEmpresa';
		$company = $this->Cliente_model->getCompany($value);
		return $company;
	}
	private function obtenerRedes()
	{
		$social = $this->Cliente_model->getRedes();
		return $social;
	}
	private function obtenerCliente($idCliente = '')
	{
		$cliente = $this->Cliente_model->obtenerCliente($idCliente);
		return $cliente;
	}
	private function obtenerFacturas($idCliente = '')
	{
		$facturas = $this->Cliente_model->obtenerFacturas($idCliente);
		return $facturas;
	}
	private function obtenerTotalPagos($factura = '')
	{
		$pagos = $this->Cliente_model->get_total_pagos($factura);
		return $pagos;
	}
}
