<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class landing extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		
		if($this->session->userdata('admin') == ''){
			echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
        $this->load->helper('array');
        $this->load->model('landing_model');
		$this->load->library('resize');
		$this->menu = 'landing';
		$this->landingList = 'Landing List';
		$this->add = 'add';

	}

	public function index()
	{
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->landingList;
		$data['q'] = $this->landing_model->all();
		$this->load->view('template/left');
		$this->load->view('landing/all',$data);
	}

	public function enable($checked,$id)
	{		
		$this->db->where('ID', $id);
		$this->db->update('landing', array( 'Enable' => $checked));
		echo "<script>window.location.assign('".base_url()."landing');</script>";
	}

	public function del($id)
	{
		$this->db->delete('landing', array('ID' => $id));
		echo "<script> window.location.assign('".base_url()."landing'); </script>";
	}

	public function add()
	{
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->add;
		$this->load->view('template/left');
		$this->load->view('landing/add',$data);
	}

	public function add_action()
	{
		$data = $this->input->post();
		$moreData = array(
		    'SaveDate' => date('Y-m-d H:i:s'),
		    'Enable' => 1,
        );
		$data = array_merge($data,$moreData);
        unset($data["_wysihtml5_mode"]);
		$this->landing_model->insertLanding($data);

		echo "<script>alert('Success!!');window.location.assign('".base_url()."landing');</script>";

	}

	public function edit($id)
	{		

		$data['landing'] = $this->landing_model->selectLanding($id);
		$this->load->view('template/left');
		$this->load->view('landing/edit',$data);


	}

	public function edit_action()
	{
        $useFormRegister = 0;
        if($this->input->post('use_form_rigister'))
        {
            $useFormRegister = 1;
        }
        $data = $this->input->post();
        $moreData = array(
            'use_form_rigister' => $useFormRegister,
            'SaveDate' => date('Y-m-d H:i:s'),
        );
        $data = array_merge($data,$moreData);
        unset($data["_wysihtml5_mode"]);
        unset($data["ID"]);


        $this->landing_model->updateLanding($this->input->post('ID'),$data);
		echo "<script>alert('Success!!');window.location.assign('".base_url()."landing');</script>";
		
	}

	protected function upload($dest,$filename,$field)
    {
    	$config['upload_path'] = $dest;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100000';
		$config['max_width']  = '3000';
		$config['max_height']  = '3000';
		$config['file_name']  = $filename;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload($field))
		{
			return array('error' => $this->upload->display_errors());
		}
		else
		{
			return  array('upload_data' => $this->upload->data());
		}
		$this->image_lib->clear();
    }
    public function report($project)
    {
        $result = $this->landing_model->getReport($project);
        $data = array(
            'q' => $result,
            'subMenu' => 'Register : ',
            'project' => $project
        );
        $this->load->view('template/left');
        $this->load->view('landing/register',$data);

    }


}