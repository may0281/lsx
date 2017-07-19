<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		
		if($this->session->userdata('admin') == ''){
			echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
		$lang = $this->session->userdata("lang")==null?"th":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
        $this->load->model('user_model');

	}
	
	
	public function index()
	{
        $data['q'] = $this->user_model->all();
        $this->load->view('template/left');
        $this->load->view('user',$data);

	}

	public function changPassword()
    {

        $pass_session = $this->session->userdata('password');
        if($pass_session != md5($this->input->post('oldpass')))
        {
            echo "<script>alert('Your old password is wrong, Please ty again');history.back();</script>";
        }
        else if($this->input->post('cpass1') != $this->input->post('pass1'))
        {
            echo "<script>alert('Confirm password is not match, Please ty again');history.back();</script>";
        }
        else {

            $this->user_model->updatePassword($this->session->userdata('admin'),array('Password' => md5($this->input->post('pass1'))));
           echo "<script>alert('Success. Please login again');window.location.assign('" . base_url() . "login/Logout');</script>";
        }

    }

    public function createUser()
    {
        $inputData = $this->input->post();

        if($inputData['Username'] == '')
        {
            echo "<script>alert('Please fill username.');window.location.assign('" . base_url() . "user');</script>";
            exit();
        }

        if($inputData['pass1'] == '' ||  $inputData['cpass1'] == '' && $inputData['role'] == '')
        {
            echo "<script>alert('Please fill password.');window.location.assign('" . base_url() . "user');</script>";
            exit();
        }

        if($inputData['role'] == '')
        {
            echo "<script>alert('Please select role.');window.location.assign('" . base_url() . "user');</script>";
            exit();
        }

        if ($inputData['cpass1'] !=  $inputData['pass1'])
        {
            echo "<script>alert('Your confirm password is not match.');window.location.assign('" . base_url() . "user');</script>";
            exit();
        }

        $data = array(
            'Username' => $inputData['Username'],
            'Name' => $inputData['Name'],
            'role' => $inputData['role'],
            'Password' => md5($inputData['pass1']) ,
            'Enable' => 1,
        );

        $check_user = $this->user_model->selectUser($data['Username']);

        if($check_user)
        {
            echo "<script>alert('This username is already in the system.');window.location.assign('" . base_url() . "user');</script>";
            exit();
        }

        $this->user_model->insertLanding($data);

        echo "<script>alert('Success');window.location.assign('" . base_url() . "user');</script>";

    }

    public function del($id)
    {
        $this->db->delete('accountadmin', array('ID' => $id));
        echo "<script>alert('Success');window.location.assign('" . base_url() . "user');</script>";
    }

    public function enable($checked,$id)
    {
        $this->db->where('ID', $id);
        $this->db->update('accountadmin', array( 'Enable' => $checked));
        echo "<script>window.location.assign('".base_url()."user');</script>";
    }


}