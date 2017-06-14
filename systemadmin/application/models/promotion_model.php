<?php
class promotion_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}

	public function all()
	{
	    $this->db->select('*');
	    $this->db->from('promotion');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insertPromotion($data)
	{
        $this->db->insert('promotion', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
	}

	public function selectPromotion($id)
	{
	    $this->db->select('*');
	    $this->db->from('promotion');
	    $this->db->where('promotion.ID',$id);
		$query = $this->db->get();
		return  $query->result_array();
	
	}

	public function updatePromotion($id,$data)
	{
		$this->db->where('ID', $id);
		$this->db->update('promotion', $data);

	}

	
}