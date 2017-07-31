<?php
class product_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}

	public function getProductType()
    {
        $query = $this->db->get_where('product_type');
        return $query->result_array();
    }

    public function getProductTypeByTypeCode($typeCode)
    {
        $query = $this->db->get_where('product_type',array('type_code'=> $typeCode));
        return $query->result_array();
    }

    public function getCategory()
    {
        $query = $this->db->get_where('product_categories');
        return $query->result_array();
    }

    public function getSubCategory($typeCode,$catCode)
    {
        $query = $this->db->get_where('product_sub_categories',array('cat_code'=>$catCode,'type_code'=>$typeCode));
        return $query->result_array();
    }

	public function loadAllProductCategory()
	{
		$query = $this->db->get_where('product_category');

		return $query->result_array();
	}

	public function getEnableType()
	{
		$query = $this->db->get_where('product_type', array('enable' => '1'));
		return $query->result_array();
	}

	public function getEnableCategory($typeCode)
	{
		$query = $this->db->get_where('product_categories', array('type_code'=>$typeCode,'enable' => '1'));
		return $query->result_array();
	}

	public function getEnableSubCategory($typeCode,$catCode)
	{
		$query = $this->db->get_where('product_sub_categories', array('type_code'=>$typeCode,'cat_code'=> $catCode,'enable' => '1'));
		return $query->result_array();
	}

	public function getAllProduct()
	{
		$sql ="select a.* from product a order by ID DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function insertProduct($data)
	{
        $this->db->insert('product', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
	}

	public function insertGallery($product_code,$img)
	{
		
		$data = array('product_Code' => $product_code ,'Image' => $img );
		$this->db->insert('product_gallery', $data);
	}

	public function getProduct($productCode)
	{
	    $this->db->select('*');
	    $this->db->from('product');
	    $this->db->where('product_code',$productCode);
		$query = $this->db->get();
		return  $query->result_array();
	
	}

	public function getGallery($productCode)
	{
	    $this->db->select('*');
	    $this->db->from('product_gallery');
	    $this->db->where('product_code',$productCode);
		$query = $this->db->get();
		return  $query->result_array();

	}

	public function updateProduct($id,$data)
	{

		$this->db->where('ID', $id);
		$this->db->update('product', $data);

	}

	
}