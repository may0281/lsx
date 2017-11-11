<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class blog extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		
		if($this->session->userdata('admin') == ''){
			echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
        $this->load->helper('array');
        $this->load->model('blog_model');
		$this->load->library('resize');
		$this->menu = 'blog';
		$this->category = 'category';
		$this->allBlog = 'all blog';
		$this->addBlog = 'add';

	}
	public function category()
	{
		$data['q'] = $this->blog_model->loadAllBlogCategory();
		$data['menu'] = $this->menu;
		$data['subMenu'] = $this->category;
		$this->load->view('template/left');
		$this->load->view('blog/category',$data);
	}

	public function catEnable($checked,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('blog_category', array( 'Enable' => $checked));
		echo "<script>window.location.assign('".base_url()."blog/category');</script>";
	}

	public function catAdd()
	{		
		$this->db->insert('blog_category', array(
		    'catTH' => $this->input->post('cat_th') ,
            'catEN' => $this->input->post('cat_en') ,
            'url' => $this->input->post('url') ,
            'updateDate' => date("Y-m-d H:i:s"),
            'Enable' => '1')
        );
		echo "<script>window.location.assign('".base_url()."blog/category');</script>";
	}

	public function catDel($checked,$id)
	{		
		$this->db->delete('blog_category', array('id' => $id));
		echo "<script>window.location.assign('".base_url()."blog/category');</script>";
	}

	public function index()
	{
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->allBlog;
		$data['q'] = $this->blog_model->all();
		$this->load->view('template/left');
		$this->load->view('blog/all',$data);
	}

	public function enable($checked,$id)
	{		
		$this->db->where('ID', $id);
		$this->db->update('blog', array( 'Enable' => $checked));
		echo "<script>window.location.assign('".base_url()."blog');</script>";
	}

	public function del($id)
	{	
		$sql ="select * from blog where ID = '".$id."' ";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $arr){
			unlink("../images/blog/".$arr['CoverImage']);
			unlink("../pdf/".$arr['pdf']);
		}
		$sqlgallery ="select * from blog_gallery where BlogID = '".$id."' ";
		$query_gallery = $this->db->query($sqlgallery);
		foreach($query_gallery->result_array() as $arr_gallery){
			unlink("../images/blog/".$arr_gallery['Image']);
		}

		$this->db->delete('blog', array('ID' => $id));
		$this->db->delete('blog_gallery', array('BlogID' => $id));
		echo "<script> window.location.assign('".base_url()."blog'); </script>";
	}

	public function add()
	{
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->addBlog;
		$data['category'] = $this->blog_model->LoadCatEnable();
		$this->load->view('template/left');
		$this->load->view('blog/add',$data);
	}

	public function add_action()
	{

		if($_FILES['coverimg']['name']) //check file upload
		{	
			$dest = "../images/blog/";
    		$CoverImage = strtotime(date("Y-m-d H:i:s")).'.'.$this->resize->filetype($_FILES['coverimg']['type']);
	    	$this->upload($dest,$CoverImage,'coverimg');
		}


		$data = $this->input->post();
		$moreData = array(
		    'CoverImage' => $CoverImage,
		    'SaveDate' => date('Y-m-d H:i:s'),
		    'Enable' => 0,
        );
		$data = array_merge($data,$moreData);
        unset($data["_wysihtml5_mode"]);
		$id = $this->blog_model->insertBlog($data);

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
                    copy($fileupload,"../images/blog/".$img);
                }
                $this->blog_model->insertGallery($id,$img);
            }
        }
		
		echo "<script>alert('Success!!');window.location.assign('".base_url()."blog');</script>";

	}

	public function edit($id)
	{		
		
		$data['category'] = $this->blog_model->LoadCatEnable();
		$data['gallery'] = $this->blog_model->selectGallery($id);
		$data['blog'] = $this->blog_model->selectBlog($id);
		$this->load->view('template/left');
		$this->load->view('blog/edit',$data);


	}

	public function edit_action()
	{
        $CoverImage = $this->input->post('coverimg_old');
		if($_FILES['coverimg']['name']) //check file upload
		{
            $dest = "../images/blog/";
            $CoverImage = strtotime(date("Y-m-d H:i:s")).'.'.$this->resize->filetype($_FILES['coverimg']['type']);
            $this->upload($dest,$CoverImage,'coverimg');
            unlink("../images/blog/".$this->input->post('coverimg_old'));
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
							copy($fileupload,"../images/blog/".$img);
							$this->blog_model->insertGallery($this->input->post('ID'),$img);
						}
                }
          }
		$del = $this->input->post('del');
		if($del){
			foreach($del as $d)
				{ 
					$exp = explode('&', $d);
					$this->db->delete('blog_gallery', array('ID' => $exp[0]));
					unlink("../images/blog/".$exp[1]);

				}
		}
        $this->blog_model->updateBlog($this->input->post('ID'),$data);
		echo "<script>alert('Success!!');window.location.assign('".base_url()."blog');</script>";
		
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