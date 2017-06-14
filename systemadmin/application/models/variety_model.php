<?php
class variety_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	
	

	
	public function varietyall()
	{
		$sql ="select * from variety order by ID DESC LIMIT 500";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function VarietyID()
	{
		$sql ="select * from variety order by ID desc LIMIT 1 ";
		$query = $this->db->query($sql);
		$q = $query->result_array();
		foreach($q as $r){}
		return $r[ID]+1;
	}

	public function insertvariety($ID,$CoverImage,$NameEN,$NameTH,$NameCN,$DescriptionEN,$DescriptionTH,$DescriptionCN,$video)
	{
		
		$data = array(
		   'ID' => $ID ,
		  
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

		$this->db->insert('variety', $data); 
	}
	public function insertgalleryvariety($VarietyID,$img)
	{
		
		$data = array(
		   'VarietyID' => $VarietyID ,
		   'Image' => $img 
		);
		$this->db->insert('galleryvariety', $data); 
	}

	public function selectvariety($id)
	{
		$sql ="select a.* from variety a where ID = '".$id."' ";
		$query = $this->db->query($sql);
		return  $query->result_array();
	
	}

	public function selectgallery($id)
	{
		$sql ="select * from  galleryvariety where VarietyID = '".$id."' ";
		$query = $this->db->query($sql);
		return  $query->result_array();

	}
	public function editvariety($VarietyID,$CoverImage,$NameEN,$NameTH,$NameCN,$DescriptionEN,$DescriptionTH,$DescriptionCN,$video)
	{
		
		$data = array(
		   
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

		$this->db->where('ID', $VarietyID);
		$this->db->update('variety', $data);

	}
	public function recommend()
	{
		$sql ="select a.ID as AID ,a.Enable as Enabled,b.* from  variety_hotnew a  left join variety b on a.VarietyID = b.ID Order by a.ID DESC ";
		$query = $this->db->query($sql);
		return  $query->result_array();
	}
	public function checkrec($VarietyID)
	{
		$sql ="select * from  variety_hotnew Where VarietyID = '".$VarietyID."' ";
		$query = $this->db->query($sql);
		return  $query->result_array();
	}
	public function varietyallnotrec($VarietyID)
	{
		$sql ="select * from variety a where NOT EXISTS (select null from variety_hotnew b Where a.ID = b.VarietyID) Order by a.ID DESC LIMIT 200";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function updaterec($checked,$id)
	{	
		$data = array(   
		   'Enable' => $checked
		);

		$this->db->where('ID', $id);
		$this->db->update('variety_hotnew', $data);

	}
	
}