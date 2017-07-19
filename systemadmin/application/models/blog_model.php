<?php
class blog_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	
	public function loadAllBlogCategory()
	{
		$query = $this->db->get_where('blog_category');

		return $query->result_array();
	}

	public function LoadCatEnable()
	{
		$query = $this->db->get_where('blog_category', array('Enable' => '1'));
		return $query->result_array();
	}

	public function all()
	{
		$sql ="select a.*,b.catEN from blog a left join blog_category b on a.CatID = b.id order by ID DESC LIMIT 500";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function insertBlog($data)
	{
        $this->db->insert('blog', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
	}

	public function insertGallery($id,$img)
	{
		$data = array('BlogID' => $id ,'Image' => $img );
		$this->db->insert('blog_gallery', $data);
	}

	public function selectBlog($id)
	{
	    $this->db->select('*');
	    $this->db->from('blog');
	    $this->db->join('blog_category','blog.CatID = blog_category.id');
	    $this->db->where('blog.ID',$id);
		$query = $this->db->get();
		return  $query->result_array();
	
	}

	public function selectGallery($id)
	{
	    $this->db->select('*');
	    $this->db->from('blog_gallery');
	    $this->db->where('BlogID',$id);
		$query = $this->db->get();
		return  $query->result_array();

	}

	public function updateBlog($id,$data)
	{

		$this->db->where('ID', $id);
		$this->db->update('blog', $data);

	}

	
}