<?php
class dashboard_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}


    public function selectUser($username)
    {
        $this->db->select('*');
        $this->db->from('accountadmin');
        $this->db->where('accountadmin.Username',$username);
        $query = $this->db->get();
        return  $query->result_array();

    }

    public function insertLanding($data)
    {
        $this->db->insert('accountadmin', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function all()
    {
        $this->db->select('*');
        $this->db->from('accountadmin');
        $query = $this->db->get();
        return  $query->result_array();
    }

    public function updatePassword($username,$data)
    {

        $this->db->where('Username', $username);
        $this->db->update('accountadmin', $data);
    }
	
}