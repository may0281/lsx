<?php
class client_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}

	public function all()
	{
        $this->db->select('*');
        $this->db->from('client');
        $query = $this->db->get();
        return  $query->result_array();
	}

	public function insert($data)
	{
        $this->db->insert('client', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
	}

	public function update($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('client', $data);
	}

	
}