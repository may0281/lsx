<?php
class landing_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}

	public function all()
	{
        $this->db->select('*');
        $this->db->from('landing');
        $query = $this->db->get();
        return  $query->result_array();
	}

	public function insertLanding($data)
	{
        $this->db->insert('landing', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
	}

    public function selectLanding($id)
	{
	    $this->db->select('*');
	    $this->db->from('landing');
	    $this->db->where('landing.ID',$id);
		$query = $this->db->get();
		return  $query->result_array();
	
	}

	public function updateLanding($id,$data)
	{

		$this->db->where('ID', $id);
		$this->db->update('landing', $data);
	}

	
}