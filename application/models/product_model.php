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
        $offset = (($page*4)-4);
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('enable',1);
        $this->db->order_by('id','desc');
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

    public function getProductByType($type,$page ,$limit)
    {
        $offset = (($page*10)-10);
        $this->db->select('a.*,b.*,c.cat_th,c.cat_en,d.sub_th,d.sub_en');
        $this->db->from('product a');
        $this->db->join('product_type b','a.type_code = b.type_code','Left');
        $this->db->join('product_categories c','a.cat_code = c.cat_code','Left');
        $this->db->join('product_sub_categories d','a.sub_cat_code = d.sub_cat_code','Left');
        $this->db->where('a.enable',1);
        $this->db->where('a.type_code',$type);
        $this->db->order_by('a.id','desc');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        return $query->result_array();
    }




}