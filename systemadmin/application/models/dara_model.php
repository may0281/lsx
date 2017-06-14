<?php
class dara_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	
	

	public function categoryall()
	{
		$sql ="select * from dara_category order by CatID DESC LIMIT 500";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function categoryenable()
	{
		$sql ="select * from dara_category where Enable = '1'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function categoryadd($cat_th,$date)
	{
		
		$data = array(
		   'CatTH' => $cat_th ,		  
		   'Date' => $date,
		   'Enable' => '1'
		);

		$this->db->insert('dara_category', $data); 
	}
	public function catenable($id,$checked)
	{
		
		$data = array(
               'Enable' => $checked   
            );
		$this->db->where('CatID', $id);
		$this->db->update('dara_category', $data); 
	}
	
	public function daraall()
	{
		$sql ="select a.*,b.CatTH from dara a left join dara_category b on a.CatID = b.CatID order by a.ID DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function daraid()
	{
		$sql ="select * from dara order by ID desc LIMIT 1 ";
		$query = $this->db->query($sql);
		$q = $query->result_array();
		foreach($q as $r){}
		return $r[ID]+1;
	}
	public function selectdara($id)
	{
		$sql ="select a.*,b.CatTH from dara a 
				left join dara_category b on a.CatID = b.CatID where ID = '".$id."' ";
		$query = $this->db->query($sql);
		return  $query->result_array();
	
	}
	public function insertdara($ID,$CatID,$CoverImage,$NameEN,$NameTH,$NameCN,$DescriptionEN,$DescriptionTH,$DescriptionCN,$video)
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

		$this->db->insert('dara', $data); 
	}
	public function insertgallerydara($daraID,$img)
	{
		
		$data = array(
		   'daraID' => $daraID ,
		   'Image' => $img 
		    
		);

		$this->db->insert('gallerydara', $data); 
	}

	public function selectgallery($id)
	{
		$sql ="select * from  gallerydara where DaraID = '".$id."' ";
		$query = $this->db->query($sql);
		return  $query->result_array();

	}
	public function editdara($daraid,$CatID,$CoverImage,$NameEN,$NameTH,$NameCN,$DescriptionEN,$DescriptionTH,$DescriptionCN,$video)
	{
		
		$data = array(
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

		$this->db->where('ID', $daraid);
		$this->db->update('dara', $data);

	}
	public function recommend()
	{
		$sql ="select a.ID as AID ,a.Enable as Enabled,a.List,b.* from  dara_hotnew a  left join dara b on a.daraID = b.ID Order by a.ID DESC";
		$query = $this->db->query($sql);
		return  $query->result_array();
	}
	public function checkrec($daraid)
	{
		$sql ="select * from  dara_hotnew Where daraID = '".$daraid."' ";
		$query = $this->db->query($sql);
		return  $query->result_array();
	}
	public function daraallnotrec($daraid)
	{
		$sql ="select * from dara a where NOT EXISTS (select null from dara_hotnew b Where a.ID = b.daraID) Order by a.ID DESC LIMIT 200";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function updaterec($checked,$id)
	{	
		$data = array(   
		   'Enable' => $checked
		);

		$this->db->where('ID', $id);
		$this->db->update('dara_hotnew', $data);

	}
	
}