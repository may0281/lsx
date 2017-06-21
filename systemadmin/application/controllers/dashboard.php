<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		
		if($this->session->userdata('admin') == ''){
			echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
		$lang = $this->session->userdata("lang")==null?"thailand":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
		$this->load->library('resize');

	}
	
	
	public function index()
	{
        $this->load->view('template/left');
        $this->load->view('dashboard');

	}


	public function insertAddress()
	{
		$address = $this->input->post('address');
		$this->db->update('address', array('Address' => $address), array('ID' => '1'));
		echo "<script>window.location.assign('".base_url()."dashboard');</script>";
	}

	public function UpdateAboutUs()
	{
		$data = $this->input->post('data');
		$this->db->update('about_us', array('data' => $data));
		echo "<script>window.location.assign('".base_url()."dashboard');</script>";
	}
	public function changPassword()
    {
        $pass_session = $this->session->userdata('password');
        if($pass_session != md5($this->input->post('oldpass')))
        {
            echo "<script>alert('Your old password is wrong, Please ty again');window.location.assign('".base_url()."dashboard');</script>";
        }
        else if($this->input->post('cpass1') != $this->input->post('pass1'))
        {
            echo "<script>alert('Confirm password is not match, Please ty again');window.location.assign('".base_url()."dashboard');</script>";
        }
        else {
            
           $this->db->update('accountadmin', array('password' => md5($this->input->post('cpass1'))), array('ID' => $this->session->userdata('ID')));
           echo "<script>window.location.assign('" . base_url() . "dashboard');</script>";
        }

    }

	
}