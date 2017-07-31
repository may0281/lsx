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

	}
	
	public function index($page = 1)
	{

        $total = $this->getCountPortfolio();
        $pagination = ceil($total/4);

        $data = array(
            'page' => $page,
            'pagi' => $pagination,
            'products' => $this->product_model->getPortfolio($page, 4),

        );
		$this->load->view("template/header",array('lang'=>$this->session->userdata("lang")));
        $this->load->view('product/page-title',array('menu'=>'Portfolio','header'=>'LATEST BLOG POSTS'));
		$this->load->view("product/index", $data);
		$this->load->view("template/footer-2");

	}

	private function getCountPortfolio()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product.Enable',1);
        $total = $this->db->count_all_results();
        return $total;
    }

    public function detail($productCode,$name)
    {
        $product = $this->product_model->getProductDetail($productCode);
        if(empty($product))
        {
            $this->load->view('template/404');
            exit();

        }
        $data['q'] = $product[0];
        $typeCode = $product[0]['type_code'];
        $catCode =$product[0]['cat_code'];
        $relate = $this->product_model->getRelate($typeCode,$catCode,$productCode);
        $data_relate['relates'] = $relate;
        $gallery = $this->product_model->getProductGallery($productCode);
        $data['productCode'] = $productCode;
        $data['g'] = $gallery;
        $this->load->view('template/header');
        $this->load->view('product/page_title');
        $this->load->view('product/detail',$data);
        $this->load->view('product/relate_product',$data_relate);
        $this->load->view('template/footer-2');

    }
	
    public function altyno($page = 1)
    {
        echo "<pre>";
        $product = $this->product_model->getProductByType('altyno',$page,10);
        var_dump($product);
    }
}