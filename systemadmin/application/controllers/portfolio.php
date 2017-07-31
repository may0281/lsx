<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class portfolio extends CI_Controller {
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
        $this->load->model('portfolio_model');

	}
	
	
	public function index()
	{
        $data = array(
            'q' => $this->portfolio_model->all(),
            'subMenu' => 'Portfolio'
        );
        $this->load->view('template/left');
        $this->load->view('portfolio/index',$data);

	}

	public function create()
    {
        $data = array('menu' => 'portfolio','subMenu' => 'Create Portfolio','action' => 'create_action');
        $this->load->view('template/left');
        $this->load->view('portfolio/manage',$data);
    }

    public function create_action()
    {
        $coverImg = null;
        if($_FILES['coverimg']['name']) //check file upload
        {
            $destination = "../images/portfolio/";
            $coverImg = strtotime(date("Y-m-d H:i:s")).'.'.$this->resize->filetype($_FILES['coverimg']['type']);
            $this->upload($destination,$coverImg,'coverimg');
        }


        $data = $this->input->post();
        $moreData = array(
            'img' => $coverImg,
            'create_date' => date('Y-m-d H:i:s'),
            'create_by' => $this->session->userdata('admin'),
            'enable' => 1,
        );
        $data = array_merge($data,$moreData);

        $id = $this->portfolio_model->createPortfolio($data);


        if ($_FILES['my_file']) {
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
                    copy($fileupload,"../images/portfolio/".$img);
                }
                $this->portfolio_model->insertGallery($id,$img);
            }
        }

        echo "<script>alert('Success!!');window.location.assign('".base_url()."portfolio');</script>";

    }

    public function edit($id)
    {
        $data = array(
            'q' => $this->portfolio_model->getContentById($id),
            'gallery' => $this->portfolio_model->getGallery($id),
            'menu' => 'Portfolio',
            'subMenu' => 'Update Portfolio',
            'action' => 'edit_action'
        );
        $this->load->view('template/left');
        $this->load->view('portfolio/manage',$data);

    }

    public function edit_action()
    {
        $coverImage = $this->input->post('coverimg_old');
        if($_FILES['coverimg']['name']) //check file upload
        {
            $destination = "../images/portfolio/";
            $coverImage = strtotime(date("Y-m-d H:i:s")).'.'.$this->resize->filetype($_FILES['coverimg']['type']);
            $this->upload($destination,$coverImage,'coverimg');
            unlink("../images/portfolio/".$this->input->post('coverimg_old'));
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
        unset($data["del"]);

        if ($_FILES['my_file']['name'][0]) {
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
                    copy($fileupload,"../images/portfolio/".$img);
                    $this->portfolio_model->insertGallery($this->input->post('id'),$img);
                }
            }
        }
        $del = $this->input->post('del');
        if($del){
            foreach($del as $d)
            {
                $exp = explode('&', $d);
                $this->db->delete('portfolio_gallery', array('id' => $exp[0]));
                unlink("../images/portfolio/".$exp[1]);
            }
        }
        $this->portfolio_model->updatePortfolio($this->input->post('id'),$data);
        echo "<script>alert('Success!!');window.location.assign('".base_url()."portfolio');</script>";

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
        $this->db->update('portfolio', array( 'enable' => $checked));
        echo "<script>window.location.assign('".base_url()."portfolio');</script>";
    }

    public function del($id)
    {
        $sql ="select * from portfolio where id = '".$id."' ";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $arr){
            unlink("../images/portfolio/".$arr['img']);
        }
        $this->db->delete('portfolio', array('id' => $id));
        echo "<script> window.location.assign('".base_url()."portfolio'); </script>";
    }



}