<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class promotion extends CI_Controller {
	

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

		$this->load->model('promotion_model');
		$this->load->model('home_model');

	}
	
	public function index($page = 1)
	{

        $total = $this->getCountPromotion();
        $pagination = ceil($total/4);

        $data = array(
            'page' => $page,
            'pagi' => $pagination,
            'promotions' => $this->promotion_model->getPromotion($page, 4),

        );
		$this->load->view("template/header");
        $this->load->view('promotion/page-title',array('menu'=>'Promotion','header'=>'Privilege for you'));
		$this->load->view("promotion/index", $data);
		$this->load->view("template/footer-2");

	}

	private function getCountPromotion()
    {
        $this->db->select('*');
        $this->db->from('promotion');
        $this->db->where('promotion.Enable',1);
        $total = $this->db->count_all_results();
        return $total;

    }

    public function detail($id,$name)
    {
        $response = $this->promotion_model->getPromotionDetail($id);

        $this->load->view('template/header');
        if(empty($response))
        {
            $this->load->view('template/404');
        }
        $data['promotion'] = $response[0];
        $page_title = array('menu'=>'Promotion','subMenu'=>'Detail');
        $this->load->view('promotion/page-title',$page_title);
        $this->load->view('promotion/detail',$data);
        $this->load->view('template/footer-2');

    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $response = $this->promotion_model->getSearch($keyword);
        $data['search'] = $response;
        $data['keyword'] = $keyword;

        $this->load->view('template/header');
        $page_title = array('menu'=>'Promotion','subMenu'=>'Search Result');
        $this->load->view('promotion/page-title',$page_title);
        $this->load->view('promotion/search',$data);

        $this->load->view('template/footer-2');
    }
	
	
}