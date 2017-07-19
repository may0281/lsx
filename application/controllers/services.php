<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class services extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$lang = $this->session->userdata("lang")==null?"th":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
		date_default_timezone_set('Asia/Bangkok');
	}
	
	public function service()
	{

		$data['title'] = 'Service';
		$this->load->view("template/header");
		$this->load->view('service',$data);
		$this->load->view('template/footer');
	}
	public function roadside()
	{

		$data['title'] = 'Roadside';
		$this->load->view("template/header");
		$this->load->view('roadside',$data);
		$this->load->view('template/footer');
	}
	public function warranty()
	{

		$data['title'] = 'Warranty';
		$this->load->view("template/header");
		$this->load->view('warranty',$data);
		$this->load->view('template/footer');
	}
	public function automotive()
	{

		$data['title'] = 'Automotive';
		$this->load->view("template/header");
		$this->load->view('automotive',$data);
		$this->load->view('template/footer');
	}
	
}