<?php
class dashboard_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}


    public function createContentSlide($data)
    {
        $this->db->insert('dashboard_slide', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function all()
    {
        $this->db->select('*');
        $this->db->from('dashboard_slide');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return  $query->result_array();
    }

    public function getContentByID($id)
    {
        $this->db->select('*');
        $this->db->from('dashboard_slide');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return  $query->result_array();
    }

    public function updateContentSlide($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('dashboard_slide', $data);
    }
	
}