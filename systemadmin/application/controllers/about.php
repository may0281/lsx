<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class about extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		
		if($this->session->userdata('admin') == ''){
			echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
		$lang = $this->session->userdata("lang")==null?"thailand":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);

	}

	public function index()
	{
        $data = array(
            'menu' => 'About LSX.'
        );
        $this->load->view('template/left');
        $this->load->view('about/index',$data);

	}

	public function insertAddress()
	{
		$address = $this->input->post('address');
		$this->db->update('address', array('Address' => $address), array('ID' => '1'));
		echo "<script>window.location.assign('".base_url()."about');</script>";
	}


	public function UpdateAboutUs()
	{
		$data = $this->input->post('data');
		$this->db->update('about_us', array('data' => $data));
		echo "<script>window.location.assign('".base_url()."about');</script>";
	}


}