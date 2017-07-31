<?php
class report_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}


    public function getContactMail()
    {
        $this->db->select('*');
        $this->db->from('contact');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return  $query->result_array();
    }

	
}