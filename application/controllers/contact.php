<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact extends CI_Controller {

	
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
		$this->load->view("template/header");
		$this->load->view("contact");
		$this->load->view("template/footer");

	}
	public function sendEmail()
	{


        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $message = $this->input->post('message');
        $tel = $this->input->post('tel');
        $career = $this->input->post('career');

//        if(!isset($name) ||
//            !isset($email) ||
//            !isset($tel) ||
//            !isset($career) ||
//            !isset($message)) {
//
//            echo '<div class="alert alert-danger alert-dismissible wow fadeInUp" role="alert">
//                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
//                  <strong>Something is wrong:</strong><br>';
//            echo "We are sorry, but there appears to be a problem with the form you submitted.<br />";
//            echo '</div>';
//            exit();
//        }
//
//
//        echo $name;
//        exit();

		$subject = 'Message from ' . $name.' [' .$email.']';
		$data = '
		Name: ' . $name . '
		Email : ' . $email . '		
		Tel : ' . $tel . '		
		Career : ' . $career . '		
		Message: ' . nl2br($message) . '
		
		** email from contact us lsx.co.th **';
		$this->email->from($email ,'Contact From LSX.CO.TH');
		$this->email->to('maya.skyt@gmail.com');
		$this->email->subject($subject);
		$this->email->message($data);
		$result = $this->email->send();

        $data = $_POST;
        $data['send_datetime'] = date('Y-m-d H:i:s');
        $data['status'] = 0;
        if($result === true)
        {
            $data['status'] = 1;
        }
        $this->db->insert('contact', $data);

        if($result === true)
        {
            $res = array(
                'status' => 'success',
                'code' => 200,
            );

        }
        else{
            $res = array(
                'status' => 'Fail',
                'code' => 400,
            );

        }
        print_r($res);

	}

	public function ourCompany()
    {
        $data['about1'] = $this->home_model->getCompanyDesc('about_column_1');
        $data['about2'] = $this->home_model->getCompanyDesc('about_column_2');
        $data['ourPromise'] = $this->home_model->getCompanyDesc('our_promise');
        $data['headOffice'] = $this->home_model->getCompanyDesc('address_head_office');
        $data['wareHouse'] = $this->home_model->getCompanyDesc('address_ware_house');
        $data['client_list'] = $this->home_model->getClientList();
        $this->load->view('template/header');
        $this->load->view('our-company',$data);
        $this->load->view('template/footer-2');
    }
	
}