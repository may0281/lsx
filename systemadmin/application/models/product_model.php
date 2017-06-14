<?php
class product_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	
	public function loadAllProductCategory()
	{
		$query = $this->db->get_where('product_category');

		return $query->result_array();
	}

	public function LoadCatEnable()
	{
		$query = $this->db->get_where('product_category', array('Enable' => '1'));
		return $query->result_array();
	}

	public function all()
	{
		$sql ="select a.*,b.catEN from product a left join product_category b on a.CatID = b.id order by ID DESC LIMIT 500";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function insertProduct($data)
	{
        $this->db->insert('product', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
	}

	public function insertGallery($id,$img)
	{
		
		$data = array('ProductID' => $id ,'Image' => $img );
		$this->db->insert('product_gallery', $data);
	}

	public function selectProduct($id)
	{
	    $this->db->select('*');
	    $this->db->from('product');
	    $this->db->join('product_category','product.CatID = product_category.id');
	    $this->db->where('product.ID',$id);
		$query = $this->db->get();
		return  $query->result_array();
	
	}

	public function selectGallery($id)
	{
	    $this->db->select('*');
	    $this->db->from('product_gallery');
	    $this->db->where('ProductID',$id);
		$query = $this->db->get();
		return  $query->result_array();

	}

	public function updateProduct($id,$data)
	{

		$this->db->where('ID', $id);
		$this->db->update('product', $data);

	}

	
}