<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		## carga de	modelos
		$this->load->model(array('Welcome_model'));

		$this->lang->load("Welcome");

	}

	public function index()
	{
		$this->load->view('welcome');
	}
}
