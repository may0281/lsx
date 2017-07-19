<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class corporate extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$lang = $this->session->userdata("lang")==null?"th":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
		date_default_timezone_set('Asia/Bangkok');
	}
	
	public function index()
	{
		$this->load->view("template/header");
		$this->load->view("corporate");
		$this->load->view("template/footer");

	}

}