<?php

/**
 * Created by PhpStorm.
 * User: sukanyatibadee
 * Date: 10/7/16
 * Time: 5:49 PM
 */
class blog_model extends  ci_model
{

    public function getBlog($page ,$limit,$category)
    {
        $offset = (($page*4)-4);
        $this->db->select('blog.*, blog_category.catTH,blog_category.catEN');
        $this->db->from('blog');
        $this->db->join('blog_category','blog.CatID = blog_category.id');
        $this->db->where('blog.Enable',1);
        if($category)
        {
            $this->db->where('blog_category.url',$category);
        }
        $this->db->order_by('blog.ID','desc');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBlogDetail($id)
    {
        $this->db->select('blog.*, blog_category.catTH,blog_category.catEN');
        $this->db->from('blog');
        $this->db->join('blog_category','blog.CatID = blog_category.id');
        $this->db->where('blog.Enable',1);
        $this->db->where('blog.ID',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBlogPreview($id)
    {
        $this->db->select('blog.*, blog_category.catTH,blog_category.catEN');
        $this->db->from('blog');
        $this->db->join('blog_category','blog.CatID = blog_category.id');
        $this->db->where('blog.ID',$id);
        $query = $this->db->get();
        return $query->result_array();
    }




}