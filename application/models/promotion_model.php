<?php

class promotion_model extends  ci_model
{

    public function getPromotion($page ,$limit)
    {
        $offset = (($page*4)-4);
        $this->db->select('*');
        $this->db->from('promotion');
        $this->db->where('enable',1);
        $this->db->where('StartDate <= ',date("Y-m-d H:i:s"));
        $this->db->where('EndDate >= ',date("Y-m-d H:i:s"));
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPromotionDetail($id)
    {
        $this->db->select('*');
        $this->db->from('promotion');
        $this->db->where('Enable',1);
        $this->db->where('ID',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSearch($keyword)
    {

        $sql = "select * from promotion where NameEN Like '%$keyword%' ";
        $sql .= " or NameTH LIKE '%$keyword%'";
        $sql .= " or ShortDescriptionEN LIKE '%$keyword%'";
        $sql .= " or ShortDescriptionTH LIKE '%$keyword%'";
        $sql .= " or DescriptionEN LIKE '%$keyword%'";
        $sql .= " or DescriptionTH LIKE '%$keyword%'";
        $sql .= " or Video LIKE '%$keyword%'";
        $sql .= " order by id desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}