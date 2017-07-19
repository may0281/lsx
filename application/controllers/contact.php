<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact extends CI_Controller {

	
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
		$this->load->view("contact");
		$this->load->view("template/footer");

	}
	public function sendemail()
	{
//		print_r($_POST);
//		exit();
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$message = $this->input->post('msg');
		$subject = 'Message from ' . $name;
		$data = 'Name: ' . $name . '
		       Email: ' . $email . '		
		       Message: ' . nl2br($message) . '';
		$this->email->from($email ,$name);
		$this->email->to('maya.skyt@gmail.com');
		$this->email->subject($subject);
		$this->email->message($data);
		$result = $this->email->send();

		if ($result) {
			echo "<script>alert('Success!!');window.location.assign('".base_url()."contact');</script>";
		} else {
			echo "<script>alert('Fail!!');window.location.assign('".base_url()."contact');</script>";
			//echo $this->email->print_debugger();
		}
	}
	
}