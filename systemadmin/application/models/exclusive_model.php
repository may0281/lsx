<?php
class exclusive_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	
	public function loadCatLifestyle()
	{
		$query = $this->db->get_where('exclusive_category');

		return $query->result_array();
	}
	public function LoadCatEnable()
	{
		$query = $this->db->get_where('exclusive_category', array('Enable' => '1'));
		return $query->result_array();
	}

	public function all()
	{
		$sql ="select a.*,b.CatTH from exclusive a left join exclusive_category b on a.CatID = b.CatID order by ID DESC LIMIT 500";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function FindID()
	{
		$sql ="select * from exclusive order by ID desc LIMIT 1 ";
		$query = $this->db->query($sql);
		$q = $query->result_array();
		foreach($q as $r){}
		return $r[ID]+1;
	}
	public function insertexclusive($ID,$CatID,$CoverImage,$NameEN,$NameTH,$NameCN,$DescriptionEN,$DescriptionTH,$DescriptionCN,$video)
	{	
		$data = array(
		   'ID' => $ID ,
		   'CatID' => $CatID ,
		   'CoverImage' => $CoverImage,
		   'NameEN' => $NameEN,
		   'NameTH' => $NameTH,
		   'NameCN' => $NameCN,
		   'DescriptionEN' => $DescriptionEN,
		   'DescriptionTH' => $DescriptionTH,
		   'DescriptionCN' => $DescriptionCN,
		   'Video' => $video,
		   'Savedate' => date("Y-m-d H:i:s"),
		   'Enable' => '1'
		);
		$this->db->insert('exclusive', $data); 
	}
	public function insertgallery($id,$img)
	{
		
		$data = array('ExclusiveID' => $id ,'Image' => $img );
		$this->db->insert('galleryexclusive', $data); 
	}

	

	public function selectexclusive($id)
	{
		$sql ="select a.*,b.CatTH from exclusive a left join exclusive_category b on a.CatID = b.CatID  where a.ID = '".$id."' ";
		$query = $this->db->query($sql);
		return  $query->result_array();
	
	}

	public function selectgallery($id)
	{
		$sql ="select * from  galleryexclusive where ExclusiveID = '".$id."' ";
		$query = $this->db->query($sql);
		return  $query->result_array();

	}
	public function editexclusive($ID,$CoverImage,$NameEN,$NameTH,$NameCN,$DescriptionEN,$DescriptionTH,$DescriptionCN,$video,$CatID)
	{
		
		$data = array(
		   
		   'CoverImage' => $CoverImage,
		   'CatID' => $CatID,
		   'NameEN' => $NameEN,
		   'NameTH' => $NameTH,
		   'NameCN' => $NameCN,
		   'DescriptionEN' => $DescriptionEN,
		   'DescriptionTH' => $DescriptionTH,
		   'DescriptionCN' => $DescriptionCN,
		   'Video' => $video,
		   'Savedate' => date("Y-m-d H:i:s"),
		   'Enable' => '1'
		);

		$this->db->where('ID', $ID);
		$this->db->update('exclusive', $data);

	}
	public function recommend()
	{
		$sql ="select a.ID as AID ,a.Enable as Enabled,b.* from  exclusive_hotnew a  left join exclusive b on a.ExclusiveID = b.ID Order by a.ID DESC ";
		$query = $this->db->query($sql);
		return  $query->result_array();
	}
	public function checkrec($ExclusiveID)
	{
		$sql ="select * from  exclusive_hotnew Where ExclusiveID = '".$ExclusiveID."' ";
		$query = $this->db->query($sql);
		return  $query->result_array();
	}
	public function exclusiveallnotrec($ExclusiveID)
	{
		$sql ="select * from exclusive a where NOT EXISTS (select null from exclusive_hotnew b Where a.ID = b.ExclusiveID) Order by a.ID DESC LIMIT 200";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
}