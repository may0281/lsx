<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		
		if($this->session->userdata('admin') == ''){
			echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
		$lang = $this->session->userdata("lang")==null?"th":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
        $this->load->library('resize');
        $this->load->model('dashboard_model');

	}
	
	
	public function index()
	{
        $data = array(
            'q' => $this->dashboard_model->all(),
            'subMenu' => 'Content Slide'
        );
        $this->load->view('template/left');
        $this->load->view('dashboard',$data);

	}

	public function create()
    {
        $data = array('menu' => 'Create','action' => 'create_action');
        $this->load->view('template/left');
        $this->load->view('manage-slide',$data);
    }

    public function create_action()
    {
        $coverImage = null;
        if($_FILES['coverimg']['name'])
        {
            $destination = "../images/content/";
            $coverImage = strtotime(date("Y-m-d H:i:s")).'.'.$this->resize->filetype($_FILES['coverimg']['type']);
            $this->upload($destination,$coverImage,'coverimg');
        }
        $dataPost =  $this->input->post();
        $data = array(
            'img' => $coverImage,
            'create_date' => date('Y-m-d H:i:s'),
            'create_by' => $this->session->userdata('admin')
        );

        $data = array_merge($data,$dataPost);
        $createData = $this->dashboard_model->createContentSlide($data);
        if($createData)
        {
            echo "<script>alert('Success!!');window.location.assign('".base_url()."dashboard');</script>";
        }
        else
        {
            echo "<script>alert('Opp!!. Something went wrong. Please try again.');window.history.back();</script>";
        }
    }

    public function edit($id)
    {
        $data = array(
            'q' => $this->dashboard_model->getContentById($id),
            'menu' => 'Update Content',
            'action' => 'edit_action'
        );
        $this->load->view('template/left');
        $this->load->view('manage-slide',$data);

    }

    public function edit_action()
    {
        $coverImage = $this->input->post('coverimg_old');
        if($_FILES['coverimg']['name']) //check file upload
        {
            $destination = "../images/content/";
            $coverImage = strtotime(date("Y-m-d H:i:s")).'.'.$this->resize->filetype($_FILES['coverimg']['type']);
            $this->upload($destination,$coverImage,'coverimg');
            unlink("../images/content/".$this->input->post('coverimg_old'));
        }


        $dataPost = $this->input->post();
        $data = array(
            'img' => $coverImage,
            'update_date' => date('Y-m-d H:i:s'),
            'update_by' => $this->session->userdata('admin')
        );
        $data = array_merge($data,$dataPost);
        unset($data["id"]);
        unset($data["coverimg_old"]);

        $this->dashboard_model->updateContentSlide($this->input->post('id'),$data);
        echo "<script>alert('Success!!');window.location.assign('".base_url()."dashboard');</script>";

    }

    protected function upload($dest,$filename,$field)
    {
        $config['upload_path'] = $dest;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
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

    public function enable($checked,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('dashboard_slide', array( 'enable' => $checked));
        echo "<script>window.location.assign('".base_url()."dashboard');</script>";
    }

    public function del($id)
    {
        $sql ="select * from dashboard_slide where id = '".$id."' ";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $arr){
            unlink("../images/content/".$arr['img']);
        }
        $this->db->delete('dashboard_slide', array('id' => $id));
        echo "<script> window.location.assign('".base_url()."dashboard'); </script>";
    }



}