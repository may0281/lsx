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
		$this->sub_category = 'sub category';
		$this->type = 'product type';
		$this->allProduct = 'all product';
		$this->addProduct = 'add';
		$this->update = 'update';

	}
	public function type()
	{
		$data['q'] = $this->product_model->getProductType();
		$data['menu'] = $this->menu;
		$data['subMenu'] = $this->type;
		$this->load->view('template/left');
		$this->load->view('products/type',$data);
	}

    public function typeCreate()
    {
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->type;
        $data['action'] = 'createType';
        $this->load->view('template/left');
        $this->load->view('products/type_manage',$data);
    }

    public function typeUpdate($typeCode)
    {
        $productType = $this->product_model->getProductTypeByTypeCode($typeCode);
        if(empty($productType))
        {
            echo "<script>alert('Type not found, Please try again.');history.back();</script>";
            exit();
        }
        $data['q'] = $productType[0];
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->type;
        $data['action'] = 'updateType';
        $this->load->view('template/left');
        $this->load->view('products/type_manage',$data);
    }

	public function enable($table,$checked,$id)
	{
		$this->db->where('id', $id);
		$this->db->update($table, array( 'enable' => $checked));
		echo "<script>history.back();</script>";
	}

	public function createType()
	{
        $find = array('!','+',' ');
        $type_code = str_replace($find,"-",$this->input->post('type_code'));
        $coverImage = null;
        if($_FILES['coverimg']['name']) //check file upload
        {
            $destination = "../images/product/";
            $coverImage = date("His").'-'.$_FILES['coverimg']['name'];
            $this->upload($destination,$coverImage,'coverimg');
        }
        $data = $this->input->post();
        $data['type_code'] =  $type_code;
        $data['img'] =  $coverImage;
        $data['create_date'] =  date("Y-m-d H:i:s");
        $data['create_by'] =  $this->session->userdata('admin');
        $data['enable'] =  1;
        unset($data['_wysihtml5_mode']);
		$this->db->insert('product_type', $data);
		echo "<script>window.location.assign('".base_url()."product/type');</script>";
	}

	public function updateType()
	{
        $coverImage = $this->input->post('oldCoverImg');
        if($_FILES['coverimg']['name']) //check file upload
        {
            $destination = "../images/product/";
            $coverImage = date("His").'-'.$_FILES['coverimg']['name'];
            $this->upload($destination,$coverImage,'coverimg');
            unlink("../images/product/".$this->input->post('oldCoverImg'));
        }

        $data = $this->input->post();
        $data['img'] =  $coverImage;

        $data['update_date'] =  date("Y-m-d H:i:s");
        $data['update_by'] =  $this->session->userdata('admin');
        unset($data['_wysihtml5_mode']);
        unset($data['oldCoverImg']);

		$this->db->where('type_code', $this->input->post('type_code'));
		$this->db->update('product_type', $data);
		echo "<script>window.location.assign('".base_url()."product/type');</script>";
	}

	public function delProductType($checked,$id)
	{
        $sql ="select * from product_type where id = '".$id."' ";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $arr){
            unlink("../images/product/".$arr['img']);
        }
		$this->db->delete('product_type', array('id' => $id));
		echo "<script>window.location.assign('".base_url()."product/type');</script>";
	}

	public function category()
    {
        $data['type'] = $this->product_model->getProductType();
        $data['q'] = $this->product_model->getCategory();
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->category;
        $this->load->view('template/left');
        $this->load->view('products/category',$data);
    }

    public function updateCategory()
    {
        $data = $this->input->post();
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['update_by'] = $this->session->userdata('admin');
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('product_categories', $data);
        echo "<script>window.location.assign('".base_url()."product/category');</script>";
    }

    public function createCategory()
    {
        $find = array('!','+',' ');
        $cat_code = str_replace($find,"-",$this->input->post('cat_code'));
        $data =  array(
            'type_code' => $this->input->post('type_code') ,
            'cat_en' => $this->input->post('cat_en') ,
            'cat_th' => $this->input->post('cat_th') ,
            'cat_code' => $cat_code ,
            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata('admin'),
            'enable' => '1');
        $this->db->insert('product_categories',$data);
        echo "<script>window.location.assign('".base_url()."product/category');</script>";
    }

    public function delCategory($checked,$id)
    {
        $this->db->delete('product_categories', array('id' => $id));
        echo "<script>window.location.assign('".base_url()."product/category');</script>";
    }

    public function subCategory($type_code,$catCode)
    {
        $data['q'] = $this->product_model->getSubCategory($type_code,$catCode);
        $data['cat'] = $this->product_model->getCategory();
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->category;
        $data['subCat'] = $this->sub_category;
        $data['catCode'] = $catCode;
        $data['typeCode'] = $type_code;
        $this->load->view('template/left');
        $this->load->view('products/sub_category',$data);

    }

    public function createSubCategory()
    {
        $find = array('!','+',' ');
        $sub_cat_code = str_replace($find,"-",$this->input->post('sub_cat_code'));
        $data =  array(
            'type_code' => $this->input->post('type_code') ,
            'cat_code' => $this->input->post('cat_code'),
            'sub_cat_code' => $sub_cat_code ,
            'sub_en' => $this->input->post('sub_en') ,
            'sub_th' => $this->input->post('sub_th') ,
            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata('admin'),
            'enable' => '1');
        $this->db->insert('product_sub_categories',$data);
        echo "<script>window.location.assign('".$_SERVER['HTTP_REFERER']."');</script>";
    }

    public function updateSubCategory()
    {
        $data = $this->input->post();
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['update_by'] = $this->session->userdata('admin');
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('product_sub_categories', $data);

        echo "<script>window.location.assign('".$_SERVER['HTTP_REFERER']."');</script>";
    }

    public function delSubCategory($checked,$id)
    {
        $this->db->delete('product_sub_categories', array('id' => $id));
        echo "<script>window.location.assign('".$_SERVER['HTTP_REFERER']."');</script>";
    }

	public function index()
	{
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->allProduct;
		$data['q'] = $this->product_model->getAllProduct();
		$this->load->view('template/left');
		$this->load->view('products/all',$data);
	}

	public function del($product_code)
	{	
		$sql ="select * from product where product_code = '".$product_code."' ";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $arr){
			unlink("../images/product/".$arr['cover_img']);
			unlink("../pdf/".$arr['pdf']);
		}
		$sqlgallery ="select * from product_gallery where product_code = '".$product_code."' ";
		$query_gallery = $this->db->query($sqlgallery);
		foreach($query_gallery->result_array() as $arr_gallery){
			unlink("../images/product/".$arr_gallery['Image']);
		}

		$this->db->delete('product', array('product_code' => $product_code));
		$this->db->delete('product_gallery', array('product_code' => $product_code));
		echo "<script> window.location.assign('".base_url()."product'); </script>";
	}

	public function add()
	{
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->addProduct;
		$data['type'] = $this->product_model->getEnableType();
		$this->load->view('template/left');
		$this->load->view('products/add',$data);
	}

	public function add_action()
	{

        $coverImage = null;
        $find = array('!','+',' ');
        $productCode = str_replace($find,"-",$this->input->post('sku'));
		if($_FILES['coverimg']['name']) //check file upload
		{	
			$descProduct = "../images/product/";
    		$coverImage = $productCode.'-'.date("His").'.'.$this->resize->filetype($_FILES['coverimg']['type']);
	    	$this->upload($descProduct,$coverImage,'coverimg');
		}
		$fileUp = null;
        if($_FILES['pdf']['name']) //check file upload
        {
            $fileType = $this->getFileType($_FILES['pdf']['name']);
            $descPdf = "../pdf/";
            $fileUp = $productCode.'-'.date("His").'.'.$fileType;
            copy($_FILES['pdf']["tmp_name"],$descPdf.$fileUp);
        }

		$data = $this->input->post();

		$moreData = array(
		    'product_code' => $productCode,
		    'sku' => strtoupper($productCode),
		    'cover_img' => $coverImage,
		    'pdf' => $fileUp,
		    'create_date' => date('Y-m-d H:i:s'),
            'create_by' => $this->session->userdata('admin'),
		    'enable' => 1,
        );
		$data = array_merge($data,$moreData);
        unset($data["_wysihtml5_mode"]);
		$this->product_model->insertProduct($data);

		if ($_FILES['my_file']['name'][0]) {
            $myFile = $_FILES['my_file'];
            $fileCount = count($myFile["name"]);
            for ($j = 0; $j < $fileCount; $j++) {

                    $fileType = $this->getFileType($myFile["name"][$j]);
                    $img =  $productCode.'-'.$j.strtotime(date("Y-m-d H:i:s")).".".$fileType;
                    $fileupload=$myFile["tmp_name"][$j];
                    if ($fileType=="jpg" or $fileType=="png" or $fileType=="gif")
                    {
                        copy($fileupload,"../images/product/".$img);
                    }
                    $this->product_model->insertGallery($productCode,$img);
            }
        }
		
		echo "<script>alert('Success!!');window.location.assign('".base_url()."product');</script>";

	}

	public function edit($productCode)
	{
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->update;
        $data['productCode'] = $productCode;
		$data['type'] = $this->product_model->getEnableType();
		$data['category'] = $this->product_model->getEnableCategory();
		$data['subCategory'] = $this->product_model->getEnableSubCategory();
		$data['gallery'] = $this->product_model->getGallery($productCode);
		$data['product'] = $this->product_model->getProduct($productCode);
		$this->load->view('template/left');
		$this->load->view('products/edit',$data);
	}

	public function edit_action()
	{
        $coverImage = $this->input->post('old_img');
        $find = array('!','+',' ');
        $productCode = str_replace($find,"-",$this->input->post('sku'));
        if($_FILES['coverimg']['name']) //check file upload
        {
            $descProduct = "../images/product/";
            $coverImage = $productCode.'-'.date("His").'.'.$this->resize->filetype($_FILES['coverimg']['type']);
            $this->upload($descProduct,$coverImage,'coverimg');
            unlink("../images/product/".$this->input->post('old_img'));
        }
        $fileUp = $this->input->post('old_pdf');
        if($_FILES['pdf']['name']) //check file upload
        {
            $fileType = $this->getFileType($_FILES['pdf']['name']);
            $descPdf = "../pdf/";
            $fileUp = $productCode.'-'.date("His").'.'.$fileType;
            copy($_FILES['pdf']["tmp_name"],$descPdf.$fileUp);
            unlink("../pdf/".$this->input->post('old_pdf'));
        }


        $data = $this->input->post();
        $moreData = array(
            'product_code' => $productCode,
            'sku' => strtoupper($productCode),
            'cover_img' => $coverImage,
            'pdf' => $fileUp,
            'update_date' => date('Y-m-d H:i:s'),
            'update_by' => $this->session->userdata('admin'),
        );

        $data = array_merge($data,$moreData);
        unset($data["_wysihtml5_mode"]);
        unset($data["ID"]);
        unset($data["old_img"]);
        unset($data["old_pdf"]);
        unset($data["del"]);
        unset($data["my_file"]);


        if ($_FILES['my_file']['name'][0])
        {
            $myFile = $_FILES['my_file'];
            $fileCount = count($myFile["name"]);
            for ($j = 0; $j < $fileCount; $j++)
            {
                $fileType = $this->getFileType($myFile["name"][$j]);
                $img =  $productCode.'-'.$j.strtotime(date("Y-m-d H:i:s")).".".$fileType;
                $fileUpload=$myFile["tmp_name"][$j];
                if ($fileType=="jpg" or $fileType=="png" or $fileType=="gif")
                {
                    copy($fileUpload,"../images/product/".$img);
                }
                $this->product_model->insertGallery($productCode,$img);
            }
        }
		$del = $this->input->post('del');
		if($del)
		{
			foreach($del as $d)
            {
                $exp = explode('&', $d);
                $this->db->delete('product_gallery', array('ID' => $exp[0]));
                unlink("../images/product/".$exp[1]);

            }
		}
        $this->product_model->updateProduct($this->input->post('id'),$data);
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

    public function apiCategory($typeCode)
    {
        $result = $this->product_model->getEnableCategory($typeCode);
        echo json_encode($result);
    }

    public function apiSubCategory($typeCode,$catCode)
    {
        $result = $this->product_model->getEnableSubCategory($typeCode,$catCode);
        echo json_encode($result);
    }

    private function getFileType($file)
    {
        $array_last = explode(".",$file);
        $c = count($array_last)-1;
        $fileType = strtolower($array_last[$c]);

        return $fileType;
    }


}