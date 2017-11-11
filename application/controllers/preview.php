<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class preview extends CI_Controller {
	

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
	
	public function blog($id)
	{
        $this->load->model('blog_model');
        $response = $this->blog_model->getBlogPreview($id);
        $this->load->view('template/header');
        if(empty($response))
        {
            echo $this->load->view('template/header','',true);
            echo $this->load->view('template/404','',true);
            echo$this->load->view('template/footer-2','',true);
            die();

        }
        $data['blog'] = $response[0];
        $page_title = array('menu'=>'Blog','subMenu'=>'Detail');
        $this->load->view('blog/page-title',$page_title);
        $this->load->view('blog/detail',$data);
        $this->load->view('template/footer-2');


    }


}