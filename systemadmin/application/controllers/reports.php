<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reports extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		
		if($this->session->userdata('admin') == ''){
			echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
		$lang = $this->session->userdata("lang")==null?"th":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
        $this->load->model('report_model');
	}

	public function index()
	{

	}

    public function contact()
    {
        $data = array(
            'q' => $this->report_model->getContactMail(),
            'subMenu' => 'Contact E-Mail'
        );
        $this->load->view('template/left');
        $this->load->view('contact',$data);

    }



}