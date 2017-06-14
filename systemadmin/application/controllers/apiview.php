<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class apiview extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	
	}
	public function index()
	{
		$app = $this->input->post('app');
		$id = $this->input->post('id');
		$this->db->set('views', 'views+1', FALSE);
		$this->db->where('id',$id);
		$this->db->update($app);

		$data = array(
		   'cate' => $app ,
		   'page_id' => $id ,
		   'date' => date('Y-m-d H:i:s')
		);
		$this->db->insert('logview', $data); 


	}
	
}
