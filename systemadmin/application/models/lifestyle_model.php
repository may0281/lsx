<?php
class lifestyle_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	
	public function loadCatLifestyle()
	{
		$query = $this->db->get_where('lifestyle_category');

		return $query->result_array();
	}
	public function LoadCatEnable()
	{
		$query = $this->db->get_where('lifestyle_category', array('Enable' => '1'));
		return $query->result_array();
	}

	public function all()
	{
		$sql ="select a.*,b.CatTH from lifestyle a left join lifestyle_category b on a.CatID = b.CatID order by ID DESC LIMIT 500";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function FindID()
	{
		$sql ="select * from lifestyle order by ID desc LIMIT 1 ";
		$query = $this->db->query($sql);
		$q = $query->result_array();
		foreach($q as $r){}
		return $r[ID]+1;
	}
	public function insertlifestyle($ID,$CatID,$CoverImage,$NameEN,$NameTH,$NameCN,$DescriptionEN,$DescriptionTH,$DescriptionCN,$video)
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
		$this->db->insert('lifestyle', $data); 
	}
	public function insertgallery($id,$img)
	{
		
		$data = array('LifestyleID' => $id ,'Image' => $img );
		$this->db->insert('gallerylifestyle', $data); 
	}

	

	public function selectlifestyle($id)
	{
		$sql ="select a.*,b.CatTH from lifestyle a left join lifestyle_category b on a.CatID = b.CatID  where a.ID = '".$id."' ";
		$query = $this->db->query($sql);
		return  $query->result_array();
	
	}

	public function selectgallery($id)
	{
		$sql ="select * from  gallerylifestyle where LifestyleID = '".$id."' ";
		$query = $this->db->query($sql);
		return  $query->result_array();

	}
	public function editlifestyle($ID,$CoverImage,$NameEN,$NameTH,$NameCN,$DescriptionEN,$DescriptionTH,$DescriptionCN,$video,$CatID)
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
		$this->db->update('lifestyle', $data);

	}
	public function recommend()
	{
		$sql ="select a.ID as AID ,a.Enable as Enabled,b.* from  lifestyle_hotnew a  left join lifestyle b on a.LifestyleID = b.ID Order by a.ID DESC ";
		$query = $this->db->query($sql);
		return  $query->result_array();
	}
	public function checkrec($LifestyleID)
	{
		$sql ="select * from  lifestyle_hotnew Where LifestyleID = '".$LifestyleID."' ";
		$query = $this->db->query($sql);
		return  $query->result_array();
	}
	public function lifestyleallnotrec($LifestyleID)
	{
		$sql ="select * from lifestyle a where NOT EXISTS (select null from lifestyle_hotnew b Where a.ID = b.LifestyleID) Order by a.ID DESC LIMIT 200";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
}