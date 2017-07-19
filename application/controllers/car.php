<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class car extends CI_Controller {
	
	public $cat_all;
	public function __construct()
	{
		parent::__construct();
		$lang = $this->session->userdata("lang")==null?"th":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
		date_default_timezone_set('Asia/Bangkok');
		$this->load->model('car_model');
		$cat_all = $this->car_model->countByCategory();
		$this->cat_all = $cat_all;
		$this->brand_list = array(
			'benz' => 22,
			'porsche' => 26,
			'bmw' => 3,
			'mini' => 37,
			'volkswagen' => 35,
			'audi' => 2,
			'land-rover' => 17,
			'mazda' => 21,
			'nissan' => 24,
			'lexus' => 18,
			'toyota' => 34,
			'rolls-royce' => 38,

		);

	}
	
	public function index($id,$name = null)
	{
		if($id == null || $name == null){
			redirect(base_url());
		}
		$data['car'] = $this->car_model->SearchCarById($id);
		$data['galls'] = $this->car_model->SearchGalleryById($id);
		$data['thumbs'] = $data['galls'];
		if($data['car'] == null){
			redirect(base_url('errors'));
		}
		$this->load->view("template/header");
		$this->load->view('car',$data);
		$this->load->view('template/footer');
	}
	
	public function car_all($page = 1)
	{
		$this->db->where(array('Car_Status' => 1));
		$this->db->where(array('Car_Condition !=' => 'Used-car'));
		$total_car = $this->db->count_all_results('car_all');

		
		$pagi = ceil($total_car/5);
		$data['h2'] = '	Inventory';
		$data['page'] = $pagi;
		$data['current_page'] = $page;
		$data['total_car'] = $total_car;
		$data['brand'] = 'all_car';
		$data['q'] = $this->car_model->QueryCar('all',$page,5);
		$this->load->view('template/header');
		$this->load->view('carlist', $data);
		$this->load->view('template/footer');
	}
	public function used_car($page = 1)
	{
		$this->db->where(array('Car_Status' => 1));
		$this->db->where(array('Car_Condition' => 'Used-car'));
		$total_car = $this->db->count_all_results('car_all');

		$pagi = ceil($total_car/5);
		$data['h2'] = '	Used Car';
		$data['page'] = $pagi;
		$data['current_page'] = $page;
		$data['total_car'] = $total_car;
		$data['brand'] = 'used_car';
		$data['q'] = $this->car_model->QueryCar('Used-car',$page,5);
		$this->load->view('template/header');
		$this->load->view('carlist', $data);
		$this->load->view('template/footer');
	}
	public function import_car($page = 1)
	{
		$this->db->where(array('Car_Status' => 1));
		$this->db->where(array('Car_Condition' => 'Importing'));
		$total_car = $this->db->count_all_results('car_all');

		$pagi = ceil($total_car/5);
		$data['h2'] = '	Importing Car';
		$data['page'] = $pagi;
		$data['current_page'] = $page;
		$data['total_car'] = $total_car;
		$data['brand'] = 'import_car';
		$data['q'] = $this->car_model->QueryCar('Importing',$page,5);
		$this->load->view('template/header');
		$this->load->view('carlist', $data);
		$this->load->view('template/footer');
	}
	public function brand($brand,$page =1 ){
		$brand_list = $this->brand_list;
		$cat_id = $brand_list[$brand];
		if(empty($cat_id)){
			redirect(base_url(404));
		}

		$this->db->where(array('Car_Status' => 1,'Car_Brand'=>$cat_id));
		$total_car = $this->db->count_all_results('car_all');

		$pagi = ceil($total_car/5);
		$data['h2'] = strtoupper($brand);
		$data['page'] = $pagi;
		$data['current_page'] = $page;
		$data['total_car'] = $total_car;
		$data['brand'] = $brand;
		$data['q'] = $this->car_model->QueryCar('all',$page,5,$cat_id);
		$this->load->view('template/header');
		$this->load->view('carlist', $data);
		$this->load->view('template/footer');
	}



	
}