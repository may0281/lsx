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
		$sql ="select * from landing where ID = '".$id."' ";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $arr){
			unlink("../images/landing/".$arr['CoverImage']);
			unlink("../pdf/".$arr['pdf']);
		}
		$sqlgallery ="select * from landing_gallery where BlogID = '".$id."' ";
		$query_gallery = $this->db->query($sqlgallery);
		foreach($query_gallery->result_array() as $arr_gallery){
			unlink("../images/landing/".$arr_gallery['Image']);
		}

		$this->db->delete('landing', array('ID' => $id));
		$this->db->delete('landing_gallery', array('BlogID' => $id));
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

		if($_FILES['coverimg']['name']) //check file upload
		{	
			$dest = "../images/landing/";
    		$CoverImage = strtotime(date("Y-m-d H:i:s")).'.'.$this->resize->filetype($_FILES['coverimg']['type']);
	    	$this->upload($dest,$CoverImage,'coverimg');
		}


		$data = $this->input->post();
		$moreData = array(
		    'CoverImage' => $CoverImage,
		    'SaveDate' => date('Y-m-d H:i:s'),
		    'Enable' => 1,
        );
		$data = array_merge($data,$moreData);
        unset($data["_wysihtml5_mode"]);
		$id = $this->landing_model->insertBlog($data);

		if (isset($_FILES['my_file'])) {
                $myFile = $_FILES['my_file'];
                $fileCount = count($myFile["name"]);
                for ($j = 0; $j < $fileCount; $j++) {
                		$array_last=explode(".",$myFile["name"][$j]);
						$c=count($array_last)-1; 
						$lastname=strtolower($array_last[$c]) ;
						$img =  $j.strtotime(date("Y-m-d H:i:s")).".".$lastname;
						$fileupload=$myFile["tmp_name"][$j];
						if ($lastname=="jpg" or $lastname=="png" or $lastname=="gif")
						{
							copy($fileupload,"../images/landing/".$img);
						}
						$this->landing_model->insertGallery($id,$img);
                }
            }
		
		echo "<script>alert('Success!!');window.location.assign('".base_url()."landing');</script>";

	}

	public function edit($id)
	{		
		
		$data['category'] = $this->landing_model->LoadCatEnable();
		$data['gallery'] = $this->landing_model->selectGallery($id);
		$data['landing'] = $this->landing_model->selectBlog($id);
		$this->load->view('template/left');
		$this->load->view('landing/edit',$data);


	}

	public function edit_action()
	{
        $CoverImage = $this->input->post('coverimg_old');
		if($_FILES['coverimg']['name']) //check file upload
		{
            $dest = "../images/landing/";
            $CoverImage = strtotime(date("Y-m-d H:i:s")).'.'.$this->resize->filetype($_FILES['coverimg']['type']);
            $this->upload($dest,$CoverImage,'coverimg');
            unlink("../images/landing/".$this->input->post('coverimg_old'));
		}


        $data = $this->input->post();
        $moreData = array(
            'CoverImage' => $CoverImage,
            'SaveDate' => date('Y-m-d H:i:s'),
        );
        $data = array_merge($data,$moreData);
        unset($data["_wysihtml5_mode"]);
        unset($data["ID"]);
        unset($data["coverimg_old"]);
        unset($data["pdf_old"]);
        unset($data["del"]);
        unset($data["my_file"]);


		if (isset($_FILES['my_file'])) {
                $myFile = $_FILES['my_file'];
                $fileCount = count($myFile["name"]);

                for ($j = 0; $j < $fileCount; $j++) {
                		$array_last=explode(".",$myFile["name"][$j]);
						$c=count($array_last)-1; 
						$lastname=strtolower($array_last[$c]) ;
						$img =  $j.strtotime(date("Y-m-d H:i:s")).".".$lastname;
						$fileupload=$myFile["tmp_name"][$j];
						if ($lastname=="jpg" or $lastname=="png" or $lastname=="gif") //จำกัดนามสกุลไฟล์ที่จะ upload ได้
						{
							copy($fileupload,"../images/landing/".$img);
							$this->landing_model->insertGallery($this->input->post('ID'),$img);
						}
                }
          }
		$del = $this->input->post('del');
		if($del){
			foreach($del as $d)
				{ 
					$exp = explode('&', $d);
					$this->db->delete('landing_gallery', array('ID' => $exp[0]));
					unlink("../images/landing/".$exp[1]);

				}
		}
        $this->landing_model->updateBlog($this->input->post('ID'),$data);
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


}