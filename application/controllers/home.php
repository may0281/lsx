<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
	

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

		$this->load->model('home_model');

	}
	
	public function index()
	{
        $data = array(
            'lang' => $this->session->userdata("lang"),
            'slides' => $this->home_model->getContentSlide(),
            'product_type' => $this->home_model->getProductType(),
            'product_list' => $this->home_model->getProductList(),
            'client_list' => $this->home_model->getClientList(),
            'ourPromise' => $this->home_model->getCompanyDesc('our_promise'),
            'about1' => $this->home_model->getCompanyDesc('about_column_1'),
            'about2' => $this->home_model->getCompanyDesc('about_column_2'),
            'blogs' => $this->home_model->getBlog(),
            'blog_categories' => $this->home_model->getBlogCategories(),
            'projects' => $this->home_model->getProject(),
        );
		$this->load->view("template/header",array('lang'=>$this->session->userdata("lang")));
		$this->load->view("dashboard", $data);
		$this->load->view("template/footer");

	}
	
	
}