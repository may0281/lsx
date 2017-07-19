<?php

/**
 * Created by PhpStorm.
 * User: sukanyatibadee
 * Date: 10/7/16
 * Time: 5:49 PM
 */
class portfolio_model extends  ci_model
{

    public function getPortfolio($page ,$limit)
    {
        $offset = (($page*4)-4);
        $this->db->select('*');
        $this->db->from('portfolio');
        $this->db->where('enable',1);
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPortfolioDetail($id)
    {
        $this->db->select('*');
        $this->db->from('portfolio');
        $this->db->where('enable',1);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataNextPrev($id)
    {
        $this->db->select('id,name_th,name_en');
        $this->db->from('portfolio');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $data = $query->result_array();
        $find = array('!','+',' ');
        $uri = str_replace($find,"-",$data[0]['name_'.$this->session->userdata('lang')]);
        $url = $data[0]['id'].'/'.$uri;

        return $url;
    }

    public function getPortfolioGallery($id)
    {
        $this->db->select('*');
        $this->db->from('portfolio_gallery');
        $this->db->where('gallery_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }




}