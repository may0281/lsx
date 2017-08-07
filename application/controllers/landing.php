<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class landing extends CI_Controller {
	

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
        $this->load->model('landing_model');
        $this->load->model('home_model');
        date_default_timezone_set('Asia/Bangkok');
	}
	
	public function index($uri)
	{
        $result = $this->landing_model->getLanding($uri);
        if(empty($result))
        {
            echo $this->load->view('template/header','',true);
            echo $this->load->view('template/404','',true);
            echo$this->load->view('template/footer-2','',true);
            die();
        }
        $data['q'] = $result[0];
        $this->load->view('template/header-landing');
        $this->load->view('landing',$data);
        if($data['q']['use_form_rigister'] == 1)
        {
            $this->load->view('template/register',array('project'=>$uri));
        }
        $this->load->view('template/footer-landing');

	}

	public function register()
    {
        $data = $this->input->post();
        $data['register_date'] = date('Y-m-d H:i:s');
        $this->db->insert('register', $data);

        $res = array(
            'status' => 'success',
            'code' => 200,
        );
        print_r($res);

    }


	
}