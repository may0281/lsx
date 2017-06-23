<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);

	}
	public function index()
	{		
		$this->load->view("authen/login");
	}
	public function checklogin()
	{
		if($this->session->userdata('admin') != '')
		{
			echo "<script> window.location.assign('".base_url()."dashboard');</script>";
		}
		$pass = md5($this->input->post('password'));		
		$q = $this->login_model->chck_login($this->input->post('username'),$pass);

		if($q)
        {
				$this->session->set_userdata('admin',$this->input->post('username'));
				$this->session->set_userdata('role',$q[0]['role']);
				$this->session->set_userdata('password',$q[0]['Password']);
				$this->session->set_userdata('id',$q[0]['ID']);

                if($q[0]['role'] == 'product')
                {
                    echo "<script>window.location='".base_url()."product';</script>";
                    exit();
                }

                else if($q[0]['role'] == 'blog')
                {
                    echo "<script>window.location='".base_url()."blog';</script>";
                    exit();
                }

                else
                {
                    echo "<script>window.location='".base_url()."dashboard';</script>";
                    exit();
                }

			}
		else
			{
				echo "<script>alert('Username or Password is wrong');history.back();</script>";
			}
			

	}

	public function Logout()
	{		
		$this->session->unset_userdata('admin');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('id');
		echo "<script>window.location.assign('".base_url()."login');</script>";
	}
	
}