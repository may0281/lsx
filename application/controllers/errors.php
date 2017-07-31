<?php

/**
 * Created by PhpStorm.
 * User: sukanyatibadee
 * Date: 6/7/16
 * Time: 9:55 PM
 */
class errors extends CI_Controller
{
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

    }
    public function index()
    {
        $this->load->model('home_model');
        $this->load->view('template/header');
        $this->load->view('template/404');
        $this->load->view('template/footer-2');
    }

}