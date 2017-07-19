<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		
		if($this->session->userdata('admin') == ''){
			echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
        $this->load->helper('array');
        $this->load->model('product_model');
		$this->load->library('resize');
		$this->menu = 'products';
		$this->category = 'category';
		$this->allProduct = 'all product';
		$this->addProduct = 'add';

	}
	public function category()
	{
		$data['q'] = $this->product_model->loadAllProductCategory();
		$data['menu'] = $this->menu;
		$data['subMenu'] = $this->subMenu;
		$this->load->view('template/left');
		$this->load->view('products/category',$data);
	}

	public function catEnable($checked,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('product_category', array( 'Enable' => $checked));
		echo "<script>window.location.assign('".base_url()."product/category');</script>";
	}

	public function createCategory()
	{

        $coverImage = null;
        if($_FILES['coverimg']['name']) //check file upload
        {
            $destination = "../images/product/";
            $coverImage = date("His").'-'.$_FILES['coverimg']['name'];
            $this->upload($destination,$coverImage,'coverimg');
        }
		$this->db->insert('product_category', array(
		    'catTH' => $this->input->post('cat_th') ,
            'catEN' => $this->input->post('cat_en') ,
            'descriptionTH' => $this->input->post('description_th') ,
            'descriptionEN' => $this->input->post('description_en') ,
            'url' => $this->input->post('url') ,
            'img' => $coverImage ,
            'updateDate' => date("Y-m-d H:i:s"),
            'Enable' => '1')
        );
		echo "<script>window.location.assign('".base_url()."product/category');</script>";
	}

	public function updateCategory()
	{
        $coverImage = $this->input->post('oldCoverImg');
        if($_FILES['coverimg']['name']) //check file upload
        {
            $destination = "../images/product/";
            $coverImage = date("His").'-'.$_FILES['coverimg']['name'];
            $this->upload($destination,$coverImage,'coverimg');
            unlink("../images/product/".$this->input->post('oldCoverImg'));
        }
        $data = array(
            'catTH' => $this->input->post('cat_th') ,
            'catEN' => $this->input->post('cat_en') ,
            'descriptionTH' => $this->input->post('description_th') ,
            'descriptionEN' => $this->input->post('description_en') ,
            'url' => $this->input->post('url') ,
            'img' => $coverImage ,
            'updateDate' => date("Y-m-d H:i:s"),
        );
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('product_category', $data);
		echo "<script>window.location.assign('".base_url()."product/category');</script>";
	}

	public function catDel($checked,$id)
	{
        $sql ="select * from product_category where id = '".$id."' ";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $arr){
            unlink("../images/product/".$arr['img']);
        }
		$this->db->delete('product_category', array('id' => $id));
		echo "<script>window.location.assign('".base_url()."product/category');</script>";
	}

	public function index()
	{
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->allProduct;
		$data['q'] = $this->product_model->all();
		$this->load->view('template/left');
		$this->load->view('products/all',$data);
	}

	public function enable($checked,$id)
	{		
		$this->db->where('ID', $id);
		$this->db->update('product', array( 'Enable' => $checked));
		echo "<script>window.location.assign('".base_url()."product');</script>";
	}

	public function del($id)
	{	
		$sql ="select * from product where ID = '".$id."' ";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $arr){
			unlink("../images/product/".$arr['CoverImage']);
			unlink("../pdf/".$arr['pdf']);
		}
		$sqlgallery ="select * from product_gallery where ProductID = '".$id."' ";
		$query_gallery = $this->db->query($sqlgallery);
		foreach($query_gallery->result_array() as $arr_gallery){
			unlink("../images/product/".$arr_gallery['Image']);
		}

		$this->db->delete('product', array('ID' => $id));
		$this->db->delete('product_gallery', array('ProductID' => $id));
		echo "<script> window.location.assign('".base_url()."product'); </script>";
	}

	public function add()
	{
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->addProduct;
		$data['category'] = $this->product_model->LoadCatEnable();
		$this->load->view('template/left');
		$this->load->view('products/add',$data);
	}

	public function add_action()
	{
		if($_FILES['coverimg']['name']) //check file upload
		{	
			$dest = "../images/product/";
    		$CoverImage = strtotime(date("Y-m-d H:i:s")).'.'.$this->resize->filetype($_FILES['coverimg']['type']);
	    	$this->upload($dest,$CoverImage,'coverimg');
		}
		$pdf = null;
        if($_FILES['pdf']['name']) //check file upload
        {
            $dest = "../pdf/";
            $pdf = strtotime(date("Y-m-d H:i:s")).'.pdf';
            $fileUpload=$_FILES['pdf']["tmp_name"];
            copy($fileUpload,$dest.$pdf);
        }

		$data = $this->input->post();
		$moreData = array(
		    'CoverImage' => $CoverImage,
		    'pdf' => $pdf,
		    'SaveDate' => date('Y-m-d H:i:s'),
		    'Enable' => 1,
        );
		$data = array_merge($data,$moreData);
        unset($data["_wysihtml5_mode"]);
		$id = $this->product_model->insertProduct($data);

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
							copy($fileupload,"../images/product/".$img);
						}
						$this->product_model->insertGallery($id,$img);
                }
            }
		
		echo "<script>alert('Success!!');window.location.assign('".base_url()."product');</script>";

	}

	public function edit($id)
	{
		$data['category'] = $this->product_model->LoadCatEnable();
		$data['gallery'] = $this->product_model->selectGallery($id);
		$data['product'] = $this->product_model->selectProduct($id);
		$this->load->view('template/left');
		$this->load->view('products/edit',$data);
	}

	public function edit_action()
	{
        $CoverImage = $this->input->post('coverimg_old');
        $pdf = $this->input->post('pdf_old');
		if($_FILES['coverimg']['name']) //check file upload
		{
            $dest = "../images/product/";
            $CoverImage = strtotime(date("Y-m-d H:i:s")).'.'.$this->resize->filetype($_FILES['coverimg']['type']);
            $this->upload($dest,$CoverImage,'coverimg');
            unlink("../images/product/".$this->input->post('coverimg_old'));
		}
        if($_FILES['pdf']['name']) //check file upload
        {
            $dest = "../pdf/";
            $pdf = strtotime(date("Y-m-d H:i:s")).'.pdf';
            $fileUpload=$_FILES['pdf']["tmp_name"];
            copy($fileUpload,$dest.$pdf);
            unlink("../pdf/".$this->input->post('pdf_old'));
        }

        $data = $this->input->post();
        $moreData = array(
            'CoverImage' => $CoverImage,
            'pdf' => $pdf,
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
							copy($fileupload,"../images/product/".$img);
							$this->product_model->insertGallery($this->input->post('ID'),$img);
						}
                }
          }
		$del = $this->input->post('del');
		if($del){
			foreach($del as $d)
				{ 
					$exp = explode('&', $d);
					$this->db->delete('product_gallery', array('ID' => $exp[0]));
					unlink("../images/product/".$exp[1]);

				}
		}
        $this->product_model->updateProduct($this->input->post('ID'),$data);
		echo "<script>alert('Success!!');window.location.assign('".base_url()."product');</script>";
		
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