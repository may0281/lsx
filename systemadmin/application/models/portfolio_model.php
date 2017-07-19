<?php
class portfolio_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}


    public function createPortfolio($data)
    {
        $this->db->insert('portfolio', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function insertGallery($id,$img)
    {
        $data = array('gallery_id' => $id ,'img' => $img );
        $this->db->insert('portfolio_gallery', $data);
    }

    public function all()
    {
        $this->db->select('*');
        $this->db->from('portfolio');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return  $query->result_array();
    }

    public function getContentByID($id)
    {
        $this->db->select('*');
        $this->db->from('portfolio');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return  $query->result_array();
    }

    public function getGallery($id)
    {
        $this->db->select('*');
        $this->db->from('portfolio_gallery');
        $this->db->where('gallery_id', $id);
        $query = $this->db->get();
        return  $query->result_array();
    }

    public function updatePortfolio($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('portfolio', $data);
    }
	
}