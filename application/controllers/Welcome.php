<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		## carga de	modelos
		$this->load->model(array('Welcome_model'));

		$this->lang->load("Welcome");
	}

	/**
	 * función index
	 * es la función encargada de cargar todo el contenido de la pagina
	 *
	 * @author César Carrasco <educamo@hotmail.com>
	 *
	 * @return void
	 * @date: [2022/10/04]
	 */
	public function index()
	{
		$mapa 		    = $this->obtenerMapa();
		$logo 			= $this->obtenerLogo();
		$title 			= $this->obtenerTitle();
		$author 		= $this->obtenerAuthor();
		$company 		= $this->obtenerCompany();
		$domain 		= $this->obtenerDominio();
		$description 	= $this->obtenerDescripcion();
		$contactMail 	= $this->obtenerContactmail();
		$keyWords 		= $this->obtenerKeywords();
		$social 		= $this->obtenerRedes();
		$modules 		= $this->obtenerModules();
		$slider			= $this->obtenerSlider();
		$projects		= $this->obtenerProjects();
		$categorys		= $this->obtenerCategorys();
		$services 		= $this->obtenerServices();
		$abouts			= $this->obtenerAbout();
		$aboutsModal	= $this->obtenerAboutmodal();

		$data['modules'] 		= $modules;
		$data['mapa'] 			= $mapa;
		$data['logo'] 			= $logo;
		$data['title'] 			= $title;
		$data['author'] 		= $author;
		$data['company'] 		= $company;
		$data['domain'] 		= $domain;
		$data['description'] 	= $description;
		$data['contactMail'] 	= $contactMail;
		$data['keyWords'] 		= $keyWords;
		$data['social'] 		= $social;
		$data['sliders'] 		= $slider;
		$data['projects']		= $projects;
		$data['categorys']		= $categorys;
		$data['services']		= $services;
		$data['abouts']			= $abouts;
		$data['aboutsModal']	= $aboutsModal;


		if ($this->session->userdata('idCliente')) {
			$data['cliente']  = $this->session->userdata('idCliente');
		} else {
			$data['cliente']  = '';
		}

		$this->plantilla($data);

		unset($data);
	}
	public function sendMessages()
	{
		$nombre 	= $this->input->post('name');
		$mail		= $this->input->post('email');
		$asunto 	= $this->input->post('subject');
		$mensaje	= $this->input->post('message');

		$to = "admin@pdg.com";
		$subject = $asunto;
		$message = $mensaje . " mensaje enviado por: " . $nombre;
		$headers = "From: " . $mail;
		mail($to, $subject, $message, $headers);
	}
	private function plantilla($data = '', $plantilla = '')
	{
		$data = $data;
		$plantilla = $this->obtenerPlantilla();

		if (!($plantilla) || ($plantilla == '')) {
			$this->load->view('welcome', $data);
		} else {
			if ($plantilla->configValue == '') {
				$plantilla = 'welcome';
			} else {
				$plantilla = $plantilla->configValue;
			}
			$this->load->view($plantilla, $data);
		}

		unset($data);
	}
	private function obtenerPlantilla($plantilla = '')
	{
		$value = 'plantilla';
		$plantilla = $this->Welcome_model->getPlantilla($value);
		return $plantilla;
	}
	/**
	 * función obtenerMapa
	 * se encarga de cargar el mapa desde la configuración
	 *
	 * @author César Carrasco <educamo@hotmail.com>
	 *
	 * @return $map (array)
	 * @date: 2022/10/04
	 */
	private function obtenerMapa()
	{
		$value = 'Mapa';
		$map = $this->Welcome_model->getMap($value);
		return $map;
	}
	/**
	 * función obtenerLogo
	 * se encarga de cargar el logo desde la configuración
	 *
	 * @author César Carrasco <educamo@hotmail.com>
	 *
	 * @return $log (array)
	 * @date: 2022/10--/04
	 */
	private function obtenerLogo()
	{
		$value = 'Logo';
		$log = $this->Welcome_model->getLogo($value);
		return $log;
	}
	/**
	 * función obtenerTitle
	 * se encarga de cargar el titulo del sitio desde la configuración
	 *
	 * @author César Carrasco <educamo@hotmail.com>
	 *
	 * @return $title (array)
	 * @date: 2022/10/04
	 */
	private function obtenerTitle()
	{
		$value = 'title';
		$title = $this->Welcome_model->getTitle($value);
		return $title;
	}
	private function obtenerAuthor()
	{
		$value = 'Design';
		$author = $this->Welcome_model->getAuthor($value);
		return $author;
	}
	private function obtenerCompany()
	{
		$value = 'nombreEmpresa';
		$company = $this->Welcome_model->getCompany($value);
		return $company;
	}
	private function obtenerDominio()
	{
		$value = 'Dominio';
		$domain = $this->Welcome_model->getDomain($value);
		return $domain;
	}
	private function obtenerDescripcion()
	{
		$value = 'Description';
		$description = $this->Welcome_model->getDescription($value);
		return $description;
	}
	private function obtenerContactmail()
	{
		$value = 'emailcontacto';
		$contactMail = $this->Welcome_model->getContactmail($value);
		return $contactMail;
	}
	private function obtenerKeywords()
	{
		$value = 'keywords';
		$keyWords = $this->Welcome_model->getKeywords($value);
		return $keyWords;
	}
	private function obtenerRedes()
	{
		$social = $this->Welcome_model->getRedes();
		return $social;
	}
	private function obtenerModules()
	{
		$modules = $this->Welcome_model->getModules();
		return $modules;
	}
	private function obtenerSlider()
	{
		$slider = $this->Welcome_model->getSlider();
		return $slider;
	}
	private function obtenerProjects()
	{
		$projects = $this->Welcome_model->getProjects();
		return $projects;
	}
	private function obtenerCategorys()
	{
		$categorys = $this->Welcome_model->getCategorys();
		return $categorys;
	}
	private function obtenerServices()
	{
		$services = $this->Welcome_model->getServices();
		return $services;
	}
	private function obtenerAbout()
	{
		$abouts = $this->Welcome_model->getAbout();
		return $abouts;
	}
	private function obtenerAboutmodal()
	{
		$aboutsModal = $this->Welcome_model->getAboutmodal();
		return $aboutsModal;
	}
	public function __destruct()
	{
		unset(
			$mapa,
			$logo,
			$title,
			$author,
			$company,
			$domain,
			$description,
			$contactMail,
			$keyWords,
			$social,
			$modules,
			$slider,
			$projects,
			$categorys,
			$services,
			$abouts,
			$aboutsModal,
		);
	}
}
