<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {
	

	public function __construct()
	{
		parent::__construct();

        $lang = $this->session->userdata("lang");
        if($this->session->userdata("lang") == null)
        {
            $lang = 'th';
            $this->session->set_userdata("lang","th");
        }
		$this->lang->load($lang,$lang);

		date_default_timezone_set('Asia/Bangkok');

		$this->load->model('product_model');
		$this->load->model('home_model');

        $this->perPage = 12;

	}
	
	public function index()
	{

        $page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $pageTitle['title'] = 'Product';
        $pageTitle['subTitle'] = 'Product List';
        $pageTitle['menu1'] = 'Product';
        $pageTitle['menu2'] = '';
        $product = $this->product_model->getProduct($page,$this->perPage);
        $total = $this->getCountProduct();
        $pagination = ceil($total/$this->perPage);
        $data = array(
            'page' => $page,
            'total' => $total,
            'pagi' => $pagination,
            'product' => $product,

        );
        $this->load->view('template/header');
        $this->load->view('product/page-title',$pageTitle);
        $this->load->view('product/index',$data);
        $this->load->view('template/footer-2');

	}

    public function detail($productCode,$name)
    {
        $product = $this->product_model->getProductDetail($productCode);
        if(empty($product))
        {
            echo $this->load->view('template/header','',true);
            echo $this->load->view('template/404','',true);
            echo$this->load->view('template/footer-2','',true);
            die();


        }
        $data['q'] = $product[0];
        $typeCode = $product[0]['type_code'];
        $catCode =$product[0]['cat_code'];
        $relate = $this->product_model->getRelate($typeCode,$catCode,$productCode);
        $data_relate['relates'] = $relate;
        $gallery = $this->product_model->getProductGallery($productCode);
        $data['productCode'] = $productCode;
        $data['g'] = $gallery;

        $pageTitle['title'] = 'Product';
        $pageTitle['subTitle'] = $product[0]['name_'.$this->session->userdata('lang')];;
        $pageTitle['menu1'] = 'product';
        $pageTitle['menu2'] = $product[0]['product_code'];;

        $this->load->view('template/header');
        $this->load->view('product/page-title',$pageTitle);
        $this->load->view('product/detail',$data);
        $this->load->view('product/relate_product',$data_relate);
        $this->load->view('template/footer-2');

    }
	
    public function altyno($category = null)
    {
        $page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $pageTitle['title'] = 'Altyno';
        $pageTitle['subTitle'] = $category;
        $pageTitle['menu1'] = 'Altyno';
        $pageTitle['menu2'] = $category;
        $product = $this->product_model->getProductByType('altyno',$category,$page,$this->perPage);
        $total = $this->getCountProduct('altyno',$category);
        $pagination = ceil($total/$this->perPage);
        $data = array(
            'page' => $page,
            'total' => $total,
            'pagi' => $pagination,
            'product' => $product,

        );
        $this->load->view('template/header');
        $this->load->view('product/page-title',$pageTitle);
        $this->load->view('product/index',$data);
        $this->load->view('template/footer-2');
    }

    public function decorSurfaces($category = null)
    {
        $page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $pageTitle['title'] = 'Decor Surfaces';
        $pageTitle['subTitle'] = $category;
        $pageTitle['menu1'] = 'Decor Surfaces';
        $pageTitle['menu2'] = $category;
        $product = $this->product_model->getProductByType('decor-surfaces',$category,$page,$this->perPage);
        $total = $this->getCountProduct('decor-surfaces',$category);
        $pagination = ceil($total/$this->perPage);
        $data = array(
            'page' => $page,
            'total' => $total,
            'pagi' => $pagination,
            'product' => $product,

        );
        $this->load->view('template/header');
        $this->load->view('product/page-title',$pageTitle);
        $this->load->view('product/index',$data);
        $this->load->view('template/footer-2');
    }

    public function jolypate($category = null)
    {
        $page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $pageTitle['title'] = 'Jolypate';
        $pageTitle['subTitle'] = $category;
        $pageTitle['menu1'] = 'Jolypate';
        $pageTitle['menu2'] = $category;
        $product = $this->product_model->getProductByType('jolypate',$category,$page,$this->perPage);
        $total = $this->getCountProduct('jolypate',$category);
        $pagination = ceil($total/$this->perPage);
        $data = array(
            'page' => $page,
            'total' => $total,
            'pagi' => $pagination,
            'product' => $product,

        );
        $this->load->view('template/header');
        $this->load->view('product/page-title',$pageTitle);
        $this->load->view('product/index',$data);
        $this->load->view('template/footer-2');
    }

    public function cerarl($category = null)
    {
        $page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $pageTitle['title'] = 'Cerarl';
        $pageTitle['subTitle'] = $category;
        $pageTitle['menu1'] = 'Cerarl';
        $pageTitle['menu2'] = $category;
        $product = $this->product_model->getProductByType('cerarl',$category,$page,$this->perPage);
        $total = $this->getCountProduct('cerarl',$category);
        $pagination = ceil($total/$this->perPage);
        $data = array(
            'page' => $page,
            'total' => $total,
            'pagi' => $pagination,
            'product' => $product,

        );
        $this->load->view('template/header');
        $this->load->view('product/page-title',$pageTitle);
        $this->load->view('product/index',$data);
        $this->load->view('template/footer-2');
    }

    protected function getCountProduct($type = null,$cat = null)
    {
        $this->db->select('*');
        $this->db->from('product');
        if($type)
        {
            $this->db->where('type_code',$type);
        }
        if($cat)
        {
            $this->db->where('cat_code',$cat);
        }
        $this->db->where('enable',1);

        $total = $this->db->count_all_results();
        return $total;
    }

    public function apiProductFilter()
    {
        header('Content-Type: application/json');

        $data= array();
        $result = $this->product_model->getNameOfProduct();
        foreach ($result as $r)
        {
            array_push($data,$r['name']);
        }
        echo json_encode($data);
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $response = $this->product_model->getSearch($keyword);
        $data['search'] = $response;
        $data['keyword'] = $keyword;

        $this->load->view('template/header');
        $page_title = array('menu1'=>'Product','menu2'=>'Search Result','title'=> 'Product' ,'subTitle'=> 'Result for '.$keyword);
        $this->load->view('product/page-title',$page_title);
        $this->load->view('product/search',$data);

        $this->load->view('template/footer-2');
    }


}