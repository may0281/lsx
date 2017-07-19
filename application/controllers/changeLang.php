<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class changeLang extends CI_Controller {
	

	public function index($lang)
	{
        $this->session->unset_userdata('lang');
        $this->session->set_userdata('lang',$lang);
	}
	
	
}