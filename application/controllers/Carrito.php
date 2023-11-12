<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Carrito extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Carrito_model');
		$this->lang->load("Carrito");
	}

	public function viewContenido($idCliente = '')
	{
		$idCliente = $this->input->post('cliente');

		$productosCarrito = $this->Carrito_model->obtenerCarrito($idCliente);

		if (!($productosCarrito) || ($productosCarrito[0]->id == NULL)) {
			$data = array(
				'empty' => 1,
			);
		} else {
			$data = array(
				'productosCarrito' => $productosCarrito,
			);
		}


		// var_dump($data); die();
		$carrito = $this->load->view('shop/carrito', $data);
		// echo $carrito;
		return $carrito;
	}
	public function addProducto($idProducto = '', $cantidad = '', $cliente = '', $priceTotal = '')
	{
		$idProducto = $this->input->post('id');
		$cantidad =  $this->input->post('cantidad');
		$cliente =  $this->input->post('idCliente');
		$priceTotal =  $this->input->post('priceTotal');


		$carrito = $this->verificarCarrito($cliente);

		if ($carrito == false) {
			$carritoNuevo = $this->newCarrito($cliente);
			if ($carritoNuevo == true) {
				$carrito = $this->verificarCarrito($cliente);
			}
		}

		$carrito_id = $carrito->id;
		$datos = array(
			'carrito_id'    => $carrito_id,
			'serviceId'     => $idProducto,
			'cantidad'      => $cantidad,
			'precio_total'  => $priceTotal,
		);

		$productoAdd = $this->addCarritoProducto($datos);


		return false;
	}
	public function updateProducto()
	{
		$datos = array(
			'id'            => $this->input->post('id'),
			'cantidad'      => $this->input->post('cantidad_actual'),
			'precio_total'  => $this->input->post('total'),
		);

		return $this->Carrito_model->updateProducto($datos);
	}
	public function deleteProducto($id = '')
	{
		$id = $this->input->post('id');
		return $this->Carrito_model->deleteProducto($id);;
	}
	public function comprar($carritoId = '')
	{

		$carrito = $this->Carrito_model->obtenerCarrito_byId($carritoId);

		$carrito = json_encode($carrito);

		//se crea la orden de servicio
		$insertOrden = $this->Carrito_model->addOrden($carrito);

		//TODO: arreglar workflow luego de que pasa al finalizar la compra y como debe generar la factura

		$idOrden = json_encode($insertOrden);
		if ($idOrden != false) {
			$mostrarOrden = $this->Carrito_model->showOrden($idOrden);
			$data = array(
				'datos' => $mostrarOrden,
			);
			$this->load->view('shop/compra', $data);
		}
	}
	private function verificarCarrito($cliente = '')
	{
		$carrito = $this->Carrito_model->verificarCarrito($cliente);
		return $carrito;
	}
	private function newCarrito($cliente = '')
	{
		$carrito = $this->Carrito_model->newCarrito($cliente);
		return $carrito;
	}
	private function addCarritoProducto($datos = '')
	{
		return $this->Carrito_model->addProducto($datos);
	}
}
