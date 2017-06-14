<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class promotion extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		
		if($this->session->userdata('admin') == ''){
			echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
        $this->load->helper('array');
        $this->load->model('promotion_model');
		$this->load->library('resize');
		$this->menu = 'promotion';
		$this->allPromotion = 'all promotion';
		$this->addPromotion = 'add';

	}

	public function index()
	{
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->allPromotion;
		$data['q'] = $this->promotion_model->all();
		$this->load->view('template/left');
		$this->load->view('promotion/all',$data);
	}

	public function enable($checked,$id)
	{		
		$this->db->where('ID', $id);
		$this->db->update('promotion', array( 'Enable' => $checked));
		echo "<script>window.location.assign('".base_url()."promotion');</script>";
	}

	public function del($id)
	{	
		$sql ="select * from promotion where ID = '".$id."' ";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $arr){
			unlink("../images/promotion/".$arr['CoverImage']);
		}
		$this->db->delete('promotion', array('ID' => $id));
		echo "<script> window.location.assign('".base_url()."promotion'); </script>";
	}

	public function add()
	{
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->addPromotion;
		$this->load->view('template/left');
		$this->load->view('promotion/add',$data);
	}

	public function add_action()
	{

		if($_FILES['coverimg']['name']) //check file upload
		{	
			$dest = "../images/promotion/";
    		$CoverImage = strtotime(date("Y-m-d H:i:s")).'.'.$this->resize->filetype($_FILES['coverimg']['type']);
	    	$this->upload($dest,$CoverImage,'coverimg');
		}

		$data = $this->input->post();
		$moreData = array(
		    'CoverImage' => $CoverImage,
		    'UpdatedAt' => date('Y-m-d H:i:s'),
		    'Enable' => 1,
        );
		$data = array_merge($data,$moreData);
        unset($data["_wysihtml5_mode"]);
		$this->promotion_model->insertPromotion($data);

		echo "<script>alert('Success!!');window.location.assign('".base_url()."promotion');</script>";

	}

	public function edit($id)
	{
		$data['promotion'] = $this->promotion_model->selectPromotion($id);
		$this->load->view('template/left');
		$this->load->view('promotion/edit',$data);
	}

	public function edit_action()
	{
        $CoverImage = $this->input->post('coverimg_old');
		if($_FILES['coverimg']['name']) //check file upload
		{
            $dest = "../images/promotion/";
            $CoverImage = strtotime(date("Y-m-d H:i:s")).'.'.$this->resize->filetype($_FILES['coverimg']['type']);
            $this->upload($dest,$CoverImage,'coverimg');
            unlink("../images/promotion/".$this->input->post('coverimg_old'));
		}

        $data = $this->input->post();
        $moreData = array(
            'CoverImage' => $CoverImage,
            'UpdatedAt' => date('Y-m-d H:i:s'),
        );
        $data = array_merge($data,$moreData);
        unset($data["_wysihtml5_mode"]);
        unset($data["ID"]);
        unset($data["coverimg_old"]);

        $this->promotion_model->updatePromotion($this->input->post('ID'),$data);
		echo "<script>alert('Success!!');window.location.assign('".base_url()."promotion');</script>";
		
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


}