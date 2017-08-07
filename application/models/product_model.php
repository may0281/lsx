<?php

/**
 * Created by PhpStorm.
 * User: sukanyatibadee
 * Date: 10/7/16
 * Time: 5:49 PM
 */
class product_model extends  ci_model
{

    public function getProduct($page ,$limit)
    {
        $offset = (($page*12)-12);
        $this->db->select('a.*,b.*,c.cat_th,c.cat_en,d.sub_th,d.sub_en');
        $this->db->from('product a');
        $this->db->join('product_type b','a.type_code = b.type_code','Left');
        $this->db->join('product_categories c','a.cat_code = c.cat_code','Left');
        $this->db->join('product_sub_categories d','a.sub_cat_code = d.sub_cat_code','Left');
        $this->db->where('a.enable',1);
        $this->db->order_by('a.update_date','desc');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getProductDetail($product_code)
    {
        $this->db->select('a.*,b.*,c.cat_th,c.cat_en,d.sub_th,d.sub_en');
        $this->db->from('product a');
        $this->db->join('product_type b','a.type_code = b.type_code','Left');
        $this->db->join('product_categories c','a.cat_code = c.cat_code','Left');
        $this->db->join('product_sub_categories d','a.sub_cat_code = d.sub_cat_code','Left');
        $this->db->where('a.enable',1);
        $this->db->where('product_code',$product_code);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getRelate($type,$cat,$productCode)
    {
        $this->db->select('a.product_code,a.name_th,a.name_en,a.cover_img,a.type_code,b.type_en,b.type_th');
        $this->db->from('product a');
        $this->db->join('product_type b','a.type_code = b.type_code','Left');
        $this->db->where('a.type_code',$type);
        $this->db->where('a.cat_code',$cat);
        $this->db->where('a.product_code !=',$productCode);
        $this->db->limit(4);
        $this->db->order_by('rand()');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getProductGallery($product_code)
    {
        $this->db->select('*');
        $this->db->from('product_gallery');
        $this->db->where('product_code',$product_code);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getProductByType($type,$category,$page ,$limit)
    {
        $offset = (($page*12)-12);
        $this->db->select('a.*,b.*,c.cat_th,c.cat_en,d.sub_th,d.sub_en');
        $this->db->from('product a');
        $this->db->join('product_type b','a.type_code = b.type_code','Left');
        $this->db->join('product_categories c','a.cat_code = c.cat_code','Left');
        $this->db->join('product_sub_categories d','a.sub_cat_code = d.sub_cat_code','Left');
        $this->db->where('a.enable',1);
        $this->db->where('a.type_code',$type);
        if($category)
        {
            $this->db->where('a.cat_code',$category);
        }
        $this->db->order_by('a.id','desc');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getNameOfProduct()
    {
        $this->db->select('distinct(name_en) as name');
        $this->db->from('product');
        $this->db->where('enable',1);
        $query = $this->db->get();
        return $query->result_array();

    }

    public function getSearch($keyword)
    {

        $sql = "select * from product where name_en Like '%$keyword%' ";
        $sql .= " or name_th LIKE '%$keyword%'";
        $sql .= " or product_code LIKE '%$keyword%'";
        $sql .= " or cat_code LIKE '%$keyword%'";
        $sql .= " or type_code LIKE '%$keyword%'";
        $sql .= " or sub_cat_code LIKE '%$keyword%'";
        $sql .= " or tags LIKE '%$keyword%'";
        $sql .= " or desc_en LIKE '%$keyword%'";
        $sql .= " or desc_th LIKE '%$keyword%'";
        $sql .= " or note_en LIKE '%$keyword%'";
        $sql .= " or note_th LIKE '%$keyword%'";
        $sql .= " order by update_date desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
