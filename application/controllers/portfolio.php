<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class portfolio extends CI_Controller {
	

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

		$this->load->model('portfolio_model');
		$this->load->model('home_model');

	}
	
	public function index($page = 1)
	{

        $total = $this->getCountPortfolio();
        $pagination = ceil($total/4);

        $data = array(
            'page' => $page,
            'pagi' => $pagination,
            'portfolios' => $this->portfolio_model->getPortfolio($page, 4),

        );
		$this->load->view("template/header",array('lang'=>$this->session->userdata("lang")));
        $this->load->view('portfolio/page-title',array('menu'=>'Portfolio','header'=>'LATEST BLOG POSTS'));
		$this->load->view("portfolio/index", $data);
		$this->load->view("template/footer-2");

	}

	private function getCountPortfolio()
    {
        $this->db->select('*');
        $this->db->from('portfolio');
        $this->db->where('portfolio.Enable',1);
        $total = $this->db->count_all_results();
        return $total;

    }

    public function detail($id,$name)
    {
        $response = $this->portfolio_model->getPortfolioDetail($id);
        $nextUrl = $this->portfolio_model->getDataNextPrev($id+1);
        $prevUrl = $this->portfolio_model->getDataNextPrev($id-1);

        $gallery = $this->portfolio_model->getPortfolioGallery($id);
        $this->load->view('template/header');
        if(empty($response))
        {
            echo $this->load->view('template/header','',true);
            echo $this->load->view('template/404','',true);
            echo$this->load->view('template/footer-2','',true);
            die();
        }
        $data['portfolio'] = $response[0];
        $data['portfolio_gallery'] = $gallery;
        $data['nextUrl'] = $nextUrl;
        $data['prevUrl'] = $prevUrl;
        $page_title = array('menu'=>'Portfolio','subMenu'=>'Detail');
        $this->load->view('portfolio/page-title',$page_title);
        $this->load->view('portfolio/detail',$data);
        $this->load->view('template/footer-2');

    }
	
	
}