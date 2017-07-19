<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class news extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$lang = $this->session->userdata("lang")==null?"th":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
		date_default_timezone_set('Asia/Bangkok');
		$this->load->model('news_model');
		$this->type_list = array('activities' => 3,'news'=>2, 'our_impression' => 1);
	}
	
	public function index($id,$name = null)
	{

		if($id == null){
			redirect(base_url());
		}
		$data['news'] = $this->news_model->SearchNewsById($id);
		if($data['news'] == null){
			redirect(base_url('errors'));
		}
		$this->load->view("template/header");
		$this->load->view('news',$data);
		$this->load->view('template/footer');
	}

	public function news_all($page = 1)
	{
		$total_car = $this->db->count_all_results('tb_new');
		$pagi = ceil($total_car/10);
		$data['h2'] = 'All About Us';
		$data['page'] = $pagi;
		$data['current_page'] = $page;
		$data['total_car'] = $total_car;
		$data['type'] = 'all_news';
		$data['q'] = $this->news_model->QueryNews($page,10);
		
		$this->load->view('template/header');
		$this->load->view('newslist', $data);
		$this->load->view('template/footer');
	}

	public function type($type,$page = 1)
	{
		$type_list = $this->type_list;
		$type_id = $type_list[$type];
		if(!$type_id){ redirect(base_url(404));}
		$this->db->where(array('type_new' => $type_id));
		$total_car = $this->db->count_all_results('tb_new');
		$pagi = ceil($total_car/10);
		$data['h2'] = $type;
		$data['page'] = $pagi;
		$data['current_page'] = $page;
		$data['total_car'] = $total_car;
		$data['type'] = $type;
		$data['q'] = $this->news_model->QueryNews($page,10,$type_id);

		$this->load->view('template/header');
		$this->load->view('newslist', $data);
		$this->load->view('template/footer');
	}
	
	
	
	
}