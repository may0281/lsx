<?php

/**
 * Created by PhpStorm.
 * User: sukanyatibadee
 * Date: 10/7/16
 * Time: 5:49 PM
 */
class home_model extends  ci_model
{

    public function getContentSlide()
    {
        $this->db->select('*');
        $this->db->from('dashboard_slide');
        $this->db->where('enable',1);
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getProductType()
    {
        $this->db->select('*');
        $this->db->from('product_category');
        $this->db->where('enable',1);
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getClientList()
    {
        $this->db->select('*');
        $this->db->from('client');
        $this->db->where('enable',1);
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCompanyDesc($type)
    {
        $this->db->select('*');
        $this->db->from('company_description');
        $this->db->where('types',$type);
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data[0];

    }
    public function sendEmail()
    {

    }

    public function getBlog()
    {
        $this->db->select('blog.*, blog_category.catTH,blog_category.catEN');
        $this->db->from('blog');
        $this->db->join('blog_category','blog.CatID = blog_category.id');
        $this->db->where('blog.Enable',1);
        $this->db->order_by('blog.ID','desc');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result_array();
    }

     public function getBlogCategories()
    {
        $this->db->select('*');
        $this->db->from('blog_category');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getProductCategories()
    {
        $this->db->select('*');
        $this->db->from('product_category');
        $this->db->where('Enable',1);
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getProject()
    {
        $this->db->select('*');
        $this->db->from('portfolio');
        $this->db->where('enable',1);
        $this->db->order_by('id','desc');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query->result_array();
    }

}